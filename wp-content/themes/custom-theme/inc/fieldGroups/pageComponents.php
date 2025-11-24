<?php

// This is the main file for the pageComponents field group
// You can duplice this file for additional post types or locations

use ACFComposer\ACFComposer;
use Flynt\Components;

add_action('Flynt/afterRegisterComponents', function (): void {
    ACFComposer::registerFieldGroup([
        'name' => 'pageComponents',
        'title' => __('Page Components', 'flynt'),
        'style' => 'seamless',
        'fields' => [
            [
                'name' => 'pageComponents',
                'label' => __('Page Components', 'flynt'),
                'type' => 'flexible_content',
                'button_label' => __('Add Component', 'flynt'),
                'acfe_flexible_add_actions' => [
                    'toggle',
                    'copy',
                ],
                'layouts' => [
                    Components\BlockAnchor\getACFLayout(),
                    Components\BlockWysiwyg\getACFLayout(),
                    Components\BlockImage\getACFLayout(),
                    Components\BlockContacts\getACFLayout(),
                    Components\BlockVideoOembed\getACFLayout(),
                    Components\BlockExample\getACFLayout(),
                    // Add components here
                    Components\Hero\getACFLayout(),
                    Components\About\getACFLayout(),
                    Components\Services\getACFLayout(),
                    Components\Lawyers\getACFLayout(),
                    Components\FAQ\getACFLayout(),
                    Components\Logos\getACFLayout(),
                    Components\Banner\getACFLayout(),
                ],
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page'
                ],
            ],
        ],
    ]);
});
