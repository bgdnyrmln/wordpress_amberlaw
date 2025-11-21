<?php
namespace Flynt\Components\Lawyers;


add_filter('Flynt/addComponentData?name=Lawyers', function ($data, $component) {
    return $data;
}, 10, 2);


function getACFLayout()
{
  return [
    'name' => 'lawyers',
    'label' => 'Lawyers',
    'sub_fields' => [
      [
        'label' => 'Title line',
        'name' => 'title',
        'type' => 'group',
        'sub_fields' => [
          [
            'label' => 'Title',
            'name' => 'title',
            'type' => 'text',
          ],
          [
            'label' => 'Spanned Word',
            'name' => 'spanned_word',
            'type' => 'text',
          ],
        ],
      ],
      [
        'label' => 'Link Text',
        'name' => 'link',
        'type' => 'text',
      ],
    ]
  ];
}