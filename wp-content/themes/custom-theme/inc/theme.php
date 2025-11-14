<?php

namespace Flynt\Theme;

use Flynt\Utils\Options;
use Flynt\Utils\Asset;

add_action('after_setup_theme', function (): void {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');

    add_post_type_support('page', 'excerpt');

    /*
     * Remove type attribute from link and script tags.
     */
    add_theme_support('html5', ['script', 'style']);
});

add_filter('get_site_icon_url', function () {
    return Asset::requireUrl('assets/images/favicon.svg');
}, 10, 2);

add_filter('big_image_size_threshold', '__return_false');

add_filter('timber/context', function (array $context): array {
    $context['theme']->labels = Options::getTranslatable('Theme')['labels'] ?? [];
    return $context;
});

// Any global values can be added here
Options::addTranslatable('Theme', [
    [
        'label' => 'Labels',
        'name' => 'labels',
        'type' => 'group',
        'sub_fields' => [
        ]
    ],
]);
