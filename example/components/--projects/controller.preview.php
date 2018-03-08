<?php
return function() {
    $image_url = u(ckit::assets() . '/showcase');
    $items = [
        (object)[
            'url' => '#',
            'title' => 'Case 1',
            'image_url' => $image_url . '/case1.jpg',
        ],
        (object)[
            'url' => '#',
            'title' => 'Case 2',
            'image_url' => $image_url . '/case2.jpg',
        ],
        (object)[
            'url' => '#',
            'title' => 'Case 3',
            'image_url' => $image_url . '/case3.jpg',
        ],
        (object)[
            'url' => '#',
            'title' => 'Case 4',
            'image_url' => $image_url . '/case4.jpg',
        ],
        (object)[
            'url' => '#',
            'title' => 'Case 5',
            'image_url' => $image_url . '/case5.jpg',
        ],
    ];
    return [
        'title' => 'Projects',
        'text' => 'Sweet cake gingerbread jelly beans oat cake. Powder toffee brownie jelly beans pie bonbon oat cake gingerbread liquorice. Apple pie sweet roll pastry. Chocolate cake cotton candy dragée gummies liquorice candy jelly beans.',
        'items' => $items,
    ];
};