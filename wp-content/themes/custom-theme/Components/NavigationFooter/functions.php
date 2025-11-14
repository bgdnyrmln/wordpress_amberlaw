<?php

namespace Flynt\Components\NavigationFooter;

use Flynt\Utils\Options;
use Timber\Timber;
use Flynt\Utils\Asset;

add_action('init', function (): void {
    register_nav_menus([
        'navigation_footer' => __('Navigation Footer', 'flynt'),
    ]);
});

add_filter('Flynt/addComponentData?name=NavigationFooter', function (array $data): array {
    $data['legal']['copyright'] = str_replace("{{year}}", date_i18n('Y'), $data['legal']['copyright']);
    $data['menu'] = Timber::get_menu('navigation_footer') ?? Timber::get_pages_menu();
    $data['logo'] = [
        'src' => Asset::requireUrl('assets/images/logo-black.svg'),
        'alt' => get_bloginfo('name')
    ];
    $data['dev'] = Asset::requireUrl('assets/images/logo-dev.svg');
    return $data;
});


Options::addTranslatable('NavigationFooter', [
    [
        'label' => __('Content', 'flynt'),
        'name' => 'contentTab',
        'type' => 'tab',
        'placement' => 'top',
        'endpoint' => 0
    ],
    [
        'label' => 'Privacy',
        'name' => 'privacy',
        'type' => 'link',
        'return_format' => 'array'
    ],
    [
        'label' => 'Cookies',
        'name' => 'cookies',
        'type' => 'link',
        'return_format' => 'array'
    ],
    [
        'label' => 'Legal',
        'name' => 'legal',
        'type' => 'group',
        'sub_fields' => [
            [
                'label' => 'Copyright',
                'name' => 'copyright',
                'type' => 'text',
                'default_value' => '©&nbsp;' . date_i18n('Y') . ' ' . get_bloginfo('name'),
            ],
        ]
    ],
]);
