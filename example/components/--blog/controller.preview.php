<?php
return function() {
    $site_controller = ckitSiteController();

    $assets_path = u(ckit::assets() . '/assets/svg');
    $paging = (object)[
        'prev_active' => false,
        'next_active' => true,
        'prev_icon_url' => $assets_path . '/arrow-left.svg',
        'next_icon_url' => $assets_path . '/arrow-right.svg',
        'prev_url' => '#',
        'next_url' => '#',
        'current' => 1
    ];

    $results = [
        'title' => 'Blog',
        'text' => 'Jujubes chocolate cake dragée. Candy chupa chups sesame snaps carrot cake jelly-o. Pastry croissant chocolate cake. Marshmallow marshmallow chupa chups donut oat cake powder.',
        'paging' => $paging,
        'assets_path' => $assets_path,
    ];

    $articles['articles'] = [
        (object)[
            'title' => 'Article1',
            'date' => date('F jS, Y'),
            'excerpt' => 'Jelly-o jelly-o cookie. Cake brownie toffee tootsie roll chocolate bar topping sugar plum marzipan cupcake. Chocolate topping chocolate bar caramels sweet. Dragée dragée chocolate cake.',
            'image_url' => u(ckit::assets() . '/--blog/image1.jpg'),
            'url' => '#'
        ],
        (object)[
            'title' => 'Article2',
            'date' => date('F jS, Y'),
            'excerpt' => 'Icing cookie brownie. Chocolate bonbon macaroon ice cream pie marshmallow fruitcake lemon drops donut. Sweet roll croissant dessert croissant jelly beans dessert gingerbread gummies.',
            'image_url' => u(ckit::assets() . '/--blog/image2.jpg'),
            'url' => '#'
        ],
        (object)[
            'title' => 'Article3',
            'date' => date('F jS, Y'),
            'excerpt' => 'Ice cream bonbon powder cake jelly cotton candy wafer cookie. Soufflé topping cake. Marzipan oat cake candy canes tart chupa chups dragée toffee lemon drops lollipop. Pie icing donut ice cream sugar plum jelly-o jujubes bear claw.',
            'image_url' => u(ckit::assets() . '/--blog/image3.jpg'),
            'url' => '#'
        ],
    ];

    $results = array_merge($site_controller, $results, $articles);
    return $results;
};