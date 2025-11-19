<?php
namespace Flynt\Components\Lawyers;


add_filter('Flynt/addComponentData?name=Lawyers', function ($data) {
    $data['title'] = get_field('title');
    $data['subtitle'] = get_field('subtitle');
    $data['lawyer_list'] = get_field('lawyer_list');
    return $data;
});


function getACFLayout()
{
  return [
    'name' => 'lawyers',
    'label' => 'Lawyers',
    'sub_fields' => [
      [
        'label' => 'Title',
        'name' => 'title',
        'type' => 'text',
      ],
      [
        'label' => 'Subtitle',
        'name' => 'subtitle',
        'type' => 'text',
      ],
      [
        'label' => 'Lawyer List',
        'name' => 'lawyer_list',
        'type' => 'repeater',
        'sub_fields' => [
          [
            'label' => 'Name',
            'name' => 'name',
            'type' => 'text',
          ],
          [
            'label' => 'Position',
            'name' => 'position',
            'type' => 'text',
          ],
          [
            'label' => 'Photo',
            'name' => 'photo',
            'type' => 'image',
          ],
        ],
      ]
    ]
  ];
}