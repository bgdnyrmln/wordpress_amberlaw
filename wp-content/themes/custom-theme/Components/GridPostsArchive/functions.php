<?php

namespace Flynt\Components\GridPostsArchive;

add_filter('Flynt/addComponentData?name=GridPostsArchive', function (array $data): array {
    $data['uuid'] ??= wp_generate_uuid4();
    return $data;
});
