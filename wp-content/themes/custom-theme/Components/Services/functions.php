<?php

namespace Flynt\Components\Services;


add_filter('Flynt/addComponentData?name=Services', function ($data) {
    return $data;
});


function getACFLayout()
{
  return [
    'name' => 'services',
    'label' => 'Services',
    'sub_fields' => [
      [
        'label' => 'Link Text',
        'name' => 'link',
        'type' => 'text',
      ],
      [
        'label' => 'Title',
        'name' => 'title',
        'type' => 'group',
        'sub_fields' => [
          [
            'label' => 'Title start',
            'name' => 'title_start',
            'type' => 'text',
          ],
          [
            'label' => 'Spanned Word',
            'name' => 'spanned_word',
            'type' => 'text',
          ],
          [
            'label' => 'Title end',
            'name' => 'title_end',
            'type' => 'text',
          ],
        ],
      ],
      [
        'label' => 'Subtitle',
        'name' => 'subtitle',
        'type' => 'textarea',
      ],
      [
        'label' => 'Table',
        'name' => 'table',
        'type' => 'group',
        'sub_fields' => [
          [
            'label' => '1st Row',
            'name' => '1',
            'type' => 'group',
            'sub_fields' => [
              [
                'label' => '1st Row - 1st Column',
                'name' => 'col_1',
                'type' => 'text',
              ],
              [
                'label' => '1st Row - 2nd Column',
                'name' => 'col_2',
                'type' => 'text',
              ],
            ]
          ],
          [
            'label' => '2nd Row',
            'name' => '2',
            'type' => 'group',
            'sub_fields' => [
              [
                'label' => '2nd Row - 1st Column',
                'name' => 'col_1',
                'type' => 'text',
              ],
              [
                'label' => '2nd Row - 2nd Column',
                'name' => 'col_2',
                'type' => 'text',
              ],
            ]
          ],
          [
            'label' => '3rd Row',
            'name' => '3',
            'type' => 'group',
            'sub_fields' => [
              [
                'label' => '3rd Row - 1st Column',
                'name' => 'col_1',
                'type' => 'text',
              ],
              [
                'label' => '3rd Row - 2nd Column',
                'name' => 'col_2',
                'type' => 'text',
              ],
            ]
          ],
          [
            'label' => '4th Row',
            'name' => '4',
            'type' => 'group',
            'sub_fields' => [
              [
                'label' => '4th Row - 1st Column',
                'name' => 'col_1',
                'type' => 'text',
              ],
              [
                'label' => '4th Row - 2nd Column',
                'name' => 'col_2',
                'type' => 'text',
              ],
            ]
          ],
        ]
      ]
    ]
  ];
}
