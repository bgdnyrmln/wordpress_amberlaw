<?php

namespace Flynt\Components\About;


add_filter('Flynt/addComponentData?name=About', function ($data) {
    $data['title'] = get_field('title');
    $data['subtitle'] = get_field('subtitle');
    return $data;
});


function getACFLayout()
{
  return [
    'name' => 'about',
    'label' => 'About',
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
