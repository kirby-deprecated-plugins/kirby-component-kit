<?php
return function() use ($data) {
    return [
        'page' => page('blog/content-in-kirby'),
        'assets_path' => $data->globals->roots->components . DS . 'icons' . DS,
    ];
};