<?php
return function() {
    $site_controller = ckitSiteController();
    $image_url = u(ckit::assets() . '/coverimage/');

    $results = [
        'title' => 'Article',
        'date' => date('F jS, Y'),
        'text' => 'Toffee gummies dragée topping toffee. Powder muffin chocolate bar lollipop cookie. Sugar plum tart chocolate cake caramels jujubes.',
        'assets_path' => ckit::directory() . str_replace('/', DS, '/assets/svg/'),
        'image_url' => $image_url . 'image.jpg',
        'paging' => (object)[
            'has_prev' => true,
            'has_next' => false,
            'prev_url' => '#',
            'next_url' => '#',
            'prev_title' => 'Prev',
            'next_title' => 'Next'
        ],
    ];

    return array_merge($site_controller, $results);
};