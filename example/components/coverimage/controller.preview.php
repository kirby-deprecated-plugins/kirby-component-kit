<?php
namespace JensTornell\ComponentKit;

return [
    'page' => page('blog/content-in-kirby'),
    'image_url' => u(settings::assets() . '/' . $data->current->id . '/image.jpg'),
];