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
                'type'  => 'text',
            ],
        ]
    ];
}
