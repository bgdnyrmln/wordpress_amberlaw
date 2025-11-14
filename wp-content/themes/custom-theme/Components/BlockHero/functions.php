<?php

namespace Flynt\Components\Hero;

use Flynt\FieldVariables;
use Flynt\Utils\Asset;


add_filter('Flynt/addComponentData?name=Hero', function ($data) {
    $acfImage = get_field('image');
    $data['image'] = [
        'src' => 'wordpress/wp-content/themes/custom-theme/assets/images/hero-image.svg',
    ];
    $data['title'] = get_field('title');
    $data['subtitle'] = get_field('subtitle');
    return $data;
});


function getACFLayout()
{
  return [
    'name' => 'hero',
    'label' => 'Hero',
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
        'label' => 'Background Image',
        'name' => 'image',
        'type' => 'image',
      ]
    ]
  ];
}
