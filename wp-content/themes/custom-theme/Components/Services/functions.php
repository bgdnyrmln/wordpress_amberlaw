<?php

namespace Flynt\Components\Services;


add_filter('Flynt/addComponentData?name=Services', function ($data) {
    $data['title'] = get_field('title');
    $data['subtitle'] = get_field('subtitle');
    return $data;
});


function getACFLayout()
{
  return [
    'name' => 'services',
    'label' => 'Services',
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
      ]
    ]
  ];
}
