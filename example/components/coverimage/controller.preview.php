<?php
namespace JensTornell\ComponentKit;

return function() use ($data) {
    return [
        'page' => page('blog/content-in-kirby'),
        'image_url' => u(ckit::assets() . '/' . $data->current->id . '/image.jpg'),
    ];
};