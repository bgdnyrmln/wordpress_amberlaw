<?php

namespace Flynt\Components\Hero;

add_filter('Flynt/addComponentData?name=Hero', function ($data, $component) {
    return $data;
}, 10, 2);

function getACFLayout()
{
    return [
        'name' => 'hero',
        'label' => 'Hero',
        'sub_fields' => [
              [
                  'label' => 'Hero Title',
                  'name'  => 'title',
                  'type'  => 'group',
                  'sub_fields' => [
                      [
                          'label' => 'Label',
                          'name'  => 'hero_label',
                          'type'  => 'text',
                      ],
                      [
                          'label' => 'Hero Title',
                          'name'  => 'hero_title',
                          'type'  => 'text',
                      ],
                      [
                          'label' => 'Subtitle Text',
                          'name'  => 'subtitle_text',
                          'type'  => 'textarea',
                          'rows'  => 4,
                      ],
                  ]
              ],
              
            [
                'label' => 'Primary Button',
                'name'  => 'primary_button',
                'type'  => 'group',
                'sub_fields' => [
                    [
                        'label' => 'Label',
                        'name'  => 'label',
                        'type'  => 'text',
                    ],
                    [
                        'label' => 'URL',
                        'name'  => 'url',
                        'type'  => 'url',
                    ],
                ],
            ],
            [
                'label' => 'Secondary Button',
                'name'  => 'secondary_button',
                'type'  => 'text',              
            ],
            [
                'label' => 'Hero Image',
                'name'  => 'hero_image',
                'type'  => 'image',
                'return_format' => 'url',
            ],
            [
                'label' => 'Background SVG',
                'name'  => 'background_svg',
                'type'  => 'textarea',
                'instructions' => 'Paste inline SVG code here.',
            ],
            [
                'label' => 'Moto',
                'name'  => 'moto',
                'type'  => 'group',
                'sub_fields' => [
                    [
                        'label' => 'Moto Title',
                        'name' => 'moto_title',
                        'type' => 'text',
                    ],
                    [
                        'label' => 'Moto Subtitle',
                        'name' => 'moto_subtitle',
                        'type' => 'textarea',
                    ],
                ],
            ],
        ],
    ];
}
