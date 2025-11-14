<?php

namespace Flynt\Components\BlockWysiwyg;

function getACFLayout(): array
{
    return [
        'name' => 'blockWysiwyg',
        'label' => __('Wysiwyg', 'flynt'),
        'sub_fields' => [
            [
                'label' => __('Text', 'flynt'),
                'name' => 'contentHtml',
                'type' => 'wysiwyg',
                'delay' => 0,
                'media_upload' => 0,
                'required' => 1,
            ],
        ]
    ];
}
