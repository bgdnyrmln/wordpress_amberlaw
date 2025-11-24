<?php

namespace Flynt\Components\Banner;

add_filter('Flynt/addComponentData?name=Banner', function ($data, $component) {
    return $data;
}, 10, 2);

function getACFLayout()
{
    return [
        'name' => 'banner',
        'label' => 'Banner',
        'sub_fields' => [
            [
                'label' => 'Banner Title',
                'name'  => 'title',
                'type'  => 'group',
                'sub_fields' => [
                    [
                        'label' => 'Title First Part',
                        'name'  => 'first',
                        'type'  => 'text',
                    ],
                    [
                        'label' => 'Title Second Part',
                        'name'  => 'second',
                        'type'  => 'text',
                    ],
                ],
            ],
            [
                'label' => 'Subtitle',
                'name'  => 'subtitle',
                'type'  => 'text',
            ],
        ]
    ];
}
