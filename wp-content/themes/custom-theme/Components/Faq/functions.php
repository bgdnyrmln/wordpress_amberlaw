<?php

namespace Flynt\Components\Faq;

add_filter('Flynt/addComponentData?name=Faq', function ($data, $component) {
    return $data;
}, 10, 2);

function getACFLayout()
{
    return [
        'name' => 'faq',
        'label' => 'FAQ',
        'sub_fields' => [
            [
                'label' => 'Title',
                'name'  => 'title',
                'type'  => 'text',
            ],
            [
                'label' => 'Link',
                'name'  => 'link',
                'type'  => 'text',
            ],
            [
                'label' => 'Boxes',
                'name'  => 'boxes',
                'type'  => 'group',
                'sub_fields' => [
                    [
                        'label' => '1',
                        'name' => '1',
                        'type' => 'group',
                        'sub_fields' => [
                            [
                                'label' => 'Heading',
                                'name'  => 'heading',
                                'type'  => 'text',
                            ],
                            [
                                'label' => 'Text',
                                'name'  => 'text',
                                'type'  => 'text',
                            ],
                            [
                                'label' => 'Link',
                                'name'  => 'link',
                                'type'  => 'text',
                            ],
                        ]
                    ],
                    [
                        'label' => '2',
                        'name' => '2',
                        'type' => 'group',
                        'sub_fields' => [
                            [
                                'label' => 'Heading',
                                'name'  => 'heading',
                                'type'  => 'text',
                            ],
                            [
                                'label' => 'Text',
                                'name'  => 'text',
                                'type'  => 'text',
                            ],
                            [
                                'label' => 'Link',
                                'name'  => 'link',
                                'type'  => 'text',
                            ],
                        ]
                    ],
                ],
            ],
            [
                'label' => 'Questions',
                'name'  => 'questions',
                'type'  => 'group',
                'sub_fields' => [
                    [
                        'label' => '1',
                        'name'  => '1',
                        'type'  => 'group',
                        'sub_fields' => [
                            [
                                'label' => 'Question',
                                'name'  => 'question',
                                'type'  => 'text',
                            ],
                            [
                                'label' => 'Answer',
                                'name'  => 'answer',
                                'type'  => 'textarea',
                            ]
                        ]
                    ],
                    [
                        'label' => '2',
                        'name'  => '2',
                        'type'  => 'group',
                        'sub_fields' => [
                            [
                                'label' => 'Question',
                                'name'  => 'question',
                                'type'  => 'text',
                            ],
                            [
                                'label' => 'Answer',
                                'name'  => 'answer',
                                'type'  => 'textarea',
                            ]
                        ]
                    ],
                    [
                        'label' => '3',
                        'name'  => '3',
                        'type'  => 'group',
                        'sub_fields' => [
                            [
                                'label' => 'Question',
                                'name'  => 'question',
                                'type'  => 'text',
                            ],
                            [
                                'label' => 'Answer',
                                'name'  => 'answer',
                                'type'  => 'textarea',
                            ]
                        ]
                    ],
                    [
                        'label' => '4',
                        'name'  => '4',
                        'type'  => 'group',
                        'sub_fields' => [
                            [
                                'label' => 'Question',
                                'name'  => 'question',
                                'type'  => 'text',
                            ],
                            [
                                'label' => 'Answer',
                                'name'  => 'answer',
                                'type'  => 'textarea',
                            ]
                        ]
                    ],
                    [
                        'label' => '5',
                        'name'  => '5',
                        'type'  => 'group',
                        'sub_fields' => [
                            [
                                'label' => 'Question',
                                'name'  => 'question',
                                'type'  => 'text',
                            ],
                            [
                                'label' => 'Answer',
                                'name'  => 'answer',
                                'type'  => 'textarea',
                            ]
                        ]
                    ],


                ]
            ],
        ],


    ];       
}
