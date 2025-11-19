<?php

namespace Flynt\Components\About;

add_filter('Flynt/addComponentData?name=About', function ($data, $component) {
    return $data;
}, 10, 2);

function getACFLayout()
{
    return [
        'label' => 'About',
        'name' => 'about',
        'sub_fields' => [
            [   
                'label' => 'About Content',
                'name'  => 'about_content',
                'type'  => 'group',
                'sub_fields' => [    
                    [
                        'label' => 'About Title',
                        'name' => 'title',
                        'type' => 'text',
                    ],
                    [
                        'label' => 'About Subtitle',
                        'name' => 'subtitle',
                        'type' => 'textarea',
                    ],
                ],
            ],
            [
                'label' => 'About Link',
                'name' => 'about_link',
                'type' => 'text',
            ],
            [
                'label' => 'About Boxes',
                'name' => 'about_boxes',
                'type' => 'group',
                'sub_fields' => [
                    [
                        'label' => 'Box 1',
                        'name' => 'box_1',
                        'type' => 'group',
                        'sub_fields' => [
                            [
                                'label' => 'Box 1 Title',
                                'name' => 'top',
                                'type' => 'text',
                            ],
                            [
                                'label' => 'Box 1 Subtitle',
                                'name' => 'bottom',
                                'type' => 'text',
                            ],
                        ],
                    ],
                    [
                        'label' => 'Box 2',
                        'name' => 'box_2',
                        'type' => 'group',
                        'sub_fields' => [
                            [
                                'label' => 'Box 2 Title',
                                'name' => 'top',
                                'type' => 'text',
                            ],
                            [
                                'label' => 'Box 2 Subtitle',
                                'name' => 'bottom',
                                'type' => 'text',
                            ],
                        ],
                    ],
                    [
                        'label' => 'Box 3',
                        'name' => 'box_3',
                        'type' => 'group',
                        'sub_fields' => [
                            [
                                'label' => 'Box 3 Title',
                                'name' => 'top',
                                'type' => 'text',
                            ],
                            [
                                'label' => 'Box 3 Subtitle',
                                'name' => 'bottom',
                                'type' => 'text',
                            ],
                        ],
                    ],
                    [
                        'label' => 'Box 4',
                        'name' => 'box_4',
                        'type' => 'group',
                        'sub_fields' => [
                            [
                                'label' => 'Box 4 Title',
                                'name' => 'text',
                                'type' => 'text',
                            ],
                        ],
                    ]
                ],
            ],  
        ],
    ];
}
