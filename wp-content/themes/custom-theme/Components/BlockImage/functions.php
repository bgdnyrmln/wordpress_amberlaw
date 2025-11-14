<?php

namespace Flynt\Components\BlockImage;

function getACFLayout(): array
{
    return [
        'name' => 'blockImage',
        'label' => __('Image', 'flynt'),
        'sub_fields' => [
            [
                'label' => __('Content', 'flynt'),
                'name' => 'contentTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ],
            [
                'label' => __('Image', 'flynt'),
                'name' => 'image',
                'type' => 'image',
                'preview_size' => 'medium',
                'required' => 1,
            ],
        ]
    ];
}
