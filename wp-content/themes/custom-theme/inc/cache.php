<?php

namespace Flynt\Cache;

add_action('init', function () {
    if (function_exists('rocket_clean_domain')) {
        $theme = wp_get_theme();
        $current_version = $theme->get('Version');
        $stored_version = get_option('cache_version');

        if ($current_version != $stored_version) {
            \rocket_clean_domain();
            update_option('cache_version', $current_version);
        }
    }
});
