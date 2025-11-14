<?php

/*
* This is the functions file for the BlockExample component
* It is used to pass data to the template, calculate values for the template, and register acf fields
* Take not of the order in which functions are defined.
* Each new component have to be included in inc/pageTemplates.php file
* Also if you are creating new component, replace 'BlockExample' with the name of the component in all of the files in this folder
* You might find that over time the components folder might get bigger, use the search feature to find the component you are looking for (Ctrl+P)
*/

// Always include namespace with component name
namespace Flynt\Components\BlockExample;

// You can include other files here
use Flynt\Utils\Options;

// Pass data to the template with Flynt/addComponentData
add_filter('Flynt/addComponentData?name=BlockExample', function ($data) {
    $data['uuid'] = $data['uuid'] ?? wp_generate_uuid4();
    $data['jsonData'] = [
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('send_message'),
        'errors' => [
            'required' => __('Lauks ir jāaizpilda obligāti', 'flynt'),
            'email' => __('E-pastam ir nederīgs formāts', 'flynt')
        ]
    ];

    return $data;
});


// You can define additional functions here, for example ajax calls
// Leave the acf funtions at the bottom

// Register ajax call for contact form that is in this component
// Note the namespace
add_action('wp_ajax_nopriv_contacts_form', __NAMESPACE__ . '\submitForm');
add_action('wp_ajax_contacts_form', __NAMESPACE__ . '\submitForm');
function submitForm()
{
    check_ajax_referer('send_message', 'nonce');

    // Contact form options
    // Use the Flynt/Utils/Options helper to get the options that are registered lower in the file
    $gloabal_options = Options::getGlobal('BlockContacts');
    // Same with translatable options
    $form_options = Options::getTranslatable('BlockContacts');

    // Subject message
    $subject = $gloabal_options['send']['subject'];

    // Map all fields to {{fieldName}} for template use
    foreach ($_POST as $key => $field) {
        if ($field) {
            $fields[ '{{' . $key . '}}' ] = $field;
        }
    }

    // // Admin email template
    $admin_message = $gloabal_options['emailMessages']['admin'];
    if ($fields) {
        $admin_message = str_replace(array_keys($fields), array_values($fields), $admin_message);
    }

    // Client email template
    $client_message = $form_options['emailMessages']['sender'];
    if ($fields) {
        $client_message = str_replace(array_keys($fields), array_values($fields), $client_message);
    }

    // Email header
    $headers = [
        'From: ' . get_bloginfo('name') . ' <noreply@' . $_SERVER['SERVER_NAME'] . '>',
        'Reply-To: ' . $_POST['email'],
        'Content-Type: text/html; charset=UTF-8',
    ];

    // Send messages to all admin emails
    if ($gloabal_options['send']['to'] && get_option('admin_email') !== $_POST['email']) {
        foreach ($gloabal_options['send']['to'] as $email) {
            wp_mail($email['email'], $subject, $admin_message, $headers);
        }
    } else {
        wp_mail(get_option('admin_email'), $subject, $admin_message, $headers);
    }

    // Send message to manufacturer email
    if ($_POST['id']) {
        $id = explode('-', $_POST['id']);
        $manufacturer_email = get_field('pageComponents', $id[0])[$id[1]]['to_email'];
        if ($manufacturer_email) {
            wp_mail($manufacturer_email, $subject, $admin_message, $headers);
        }
    }

    // Send message to client
    if ($client_message) {
        wp_mail($_POST['email'], $subject, $client_message, $headers);
    }

    $json['status']  = '000';
    $json['redirect'] = $form_options['successLink']['url'];
    wp_send_json($json);
    die();
}

// Register acf fields with getACFLayout
// Use Flynt snippets extension
// https://marketplace.visualstudio.com/items?itemName=dominikbiedebach.flynt-snippets
function getACFLayout()
{
    return [
        'name' => 'BlockExample',
        'label' => __('Example block', 'flynt'),
        'sub_fields' => [
            [
                'label' => 'Content',
                'name' => 'contentTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0
            ],
            [
                'label' => 'Content',
                'name' => 'content',
                'type' => 'wysiwyg',
                'tabs' => 'visual,text',
                'toolbar' => 'default',
                'media_upload' => 0,
                'delay' => 1
            ],
            [
                'label' => 'Image',
                'name' => 'image',
                'type' => 'image',
                'return_format' => 'array',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ],
            [
                'label' => 'Items',
                'name' => 'items',
                'type' => 'repeater',
                'collapsed' => '',
                'min' => 0,
                'max' => 0,
                'layout' => 'table',
                'button_label' => 'Add Item',
                'sub_fields' => [
                    [
                        'label' => 'Icon',
                        'name' => 'icon',
                        'type' => 'image',
                        'return_format' => 'array',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                    ],
                    [
                        'label' => 'Title',
                        'name' => 'title',
                        'type' => 'text'
                    ],
                ]
            ],
            [
                'label' => 'Contacts',
                'name' => 'contactsTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0
            ],
            [
                'label' => 'Email',
                'name' => 'email',
                'type' => 'text'
            ],
            [
                'label' => 'Phone',
                'name' => 'phone',
                'type' => 'text'
            ],
            [
                'label' => 'Address',
                'name' => 'address',
                'type' => 'text'
            ],
        ]
    ];
}

// Register global options with addGlobal
Options::addGlobal('BlockExample', [
    [
        'label' => 'Sending',
        'name' => 'sendingTab',
        'type' => 'tab',
        'placement' => 'top',
        'endpoint' => 0
    ],
    [
        'label' => 'Sending',
        'name' => 'send',
        'type' => 'group',
        'sub_fields' => [
            [
                'label' => 'Subject',
                'name' => 'subject',
                'type' => 'text'
            ],
            [
                'label' => 'To',
                'name' => 'to',
                'type' => 'repeater',
                'collapsed' => '',
                'layout' => 'table',
                'button_label' => 'Add email',
                'sub_fields' => [
                    [
                        'label' => 'Email',
                        'name' => 'email',
                        'type' => 'email'
                    ],
                ]
            ],
        ]
    ],
    [
        'label' => 'Email Messages',
        'name' => 'emailMessages',
        'type' => 'group',
        'sub_fields' => [
            [
                'label' => 'Admin',
                'name' => 'admin',
                'type' => 'wysiwyg',
                'tabs' => 'visual,text',
                'toolbar' => 'default',
                'media_upload' => 0,
                'delay' => 1
            ],
        ]
    ],
]);

// Register translatable options with addTranslatable
Options::addTranslatable('BlockExample', [
    [
        'label' => 'Messages',
        'name' => 'messagesTab',
        'type' => 'tab',
        'placement' => 'top',
        'endpoint' => 0
    ],
    [
        'label' => 'Form Messages',
        'name' => 'formMessages',
        'type' => 'group',
        'sub_fields' => [
            [
                'label' => 'Success',
                'name' => 'success',
                'type' => 'wysiwyg',
                'tabs' => 'visual,text',
                'toolbar' => 'default',
                'media_upload' => 0,
                'delay' => 1
            ],
            [
                'label' => 'Error',
                'name' => 'error',
                'type' => 'wysiwyg',
                'tabs' => 'visual,text',
                'toolbar' => 'default',
                'media_upload' => 0,
                'delay' => 1
            ],
        ]
    ],
    [
        'label' => 'Email Messages',
        'name' => 'emailMessages',
        'type' => 'group',
        'sub_fields' => [
            [
                'label' => 'Sender',
                'name' => 'sender',
                'type' => 'wysiwyg',
                'tabs' => 'visual,text',
                'toolbar' => 'default',
                'media_upload' => 0,
                'delay' => 1
            ],
        ]
    ],
    [
        'label' => 'Success Link',
        'name' => 'successLink',
        'type' => 'link',
        'return_format' => 'array'
    ],
    [
        'label' => __('Labels', 'flynt'),
        'name' => 'labelsTab',
        'type' => 'tab',
        'placement' => 'top',
        'endpoint' => 0
    ],
    [
        'label' => '',
        'name' => 'labels',
        'type' => 'group',
        'sub_fields' => [
            [
                'label' => __('Name', 'flynt'),
                'name' => 'name',
                'type' => 'text',
                'default_value' => __('Vārds', 'flynt'),
                'required' => 1,
                'wrapper' => [
                    'width' => '50',
                ],
            ],
            [
                'label' => __('Email', 'flynt'),
                'name' => 'email',
                'type' => 'text',
                'default_value' => __('E-pasts', 'flynt'),
                'required' => 1,
                'wrapper' => [
                    'width' => '50',
                ],
            ],
            [
                'label' => __('Phone', 'flynt'),
                'name' => 'phone',
                'type' => 'text',
                'default_value' => __('Tālrunis', 'flynt'),
                'required' => 1,
                'wrapper' => [
                    'width' => '50',
                ],
            ],
            [
                'label' => __('Message', 'flynt'),
                'name' => 'message',
                'type' => 'text',
                'default_value' => __('Jautājums', 'flynt'),
                'required' => 1,
                'wrapper' => [
                    'width' => '50',
                ],
            ],
            [
                'label' => __('Privacy notice', 'flynt'),
                'name' => 'privacyNotice',
                'type' => 'wysiwyg',
                'tabs' => 'visual,text',
                'toolbar' => 'default',
                'default_value' => __('Piekrītu Privātuma Politikai', 'flynt'),
                'media_upload' => 0,
                'delay' => 1,
                'wrapper' => [
                    'width' => '50',
                ],
            ],
            [
                'label' => __('Submit', 'flynt'),
                'name' => 'submit',
                'type' => 'text',
                'default_value' => __('SŪTĪT PIETEIKUMU', 'flynt'),
                'required' => 1,
                'wrapper' => [
                    'width' => '50',
                ],
            ],
            [
                'label' => __('Form title', 'flynt'),
                'name' => 'formTitle',
                'type' => 'text',
                'default_value' => __('Sazinieties ar mums!', 'flynt'),
                'required' => 1,
                'wrapper' => [
                    'width' => '50',
                ],
            ],
            [
                'label' => __('Form description', 'flynt'),
                'name' => 'formDescription',
                'type' => 'text',
                'default_value' => __('Lūdzu, aizpildiet zemāk esošo formu, lai saņemtu piedāvājumu vai uzdotu jautājumu.', 'flynt'),
                'required' => 1,
                'wrapper' => [
                    'width' => '50',
                ],
            ],
        ],
    ],
]);
