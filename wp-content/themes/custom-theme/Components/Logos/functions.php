<?php

namespace Flynt\Components\Logos;

add_filter('Flynt/addComponentData?name=Logos', function ($data, $component) {
    return $data;
}, 10, 2
);

function getACFLayout()
{
    return[
        'name' => 'logos',
        'label' => 'Logos',
        'sub_fields' => [
            [
                'label' => 'Title',
                'name'  => 'title',
                'type'  => 'text',
            ],
            [
                'label' => 'Subtitle',
                'name'  => 'subtitle',
                'type'  => 'text',
            ],
            [
                'label' => 'Logos Images',
                'name'  => 'logos_images',
                'type'  => 'gallery',
                'instructions' => 'Add logos images here',
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
            ],
        ],
    ];
}