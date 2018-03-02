<?php
return function($site) use ($ckit) {
    $image_url = u(ckit::assets() . '/' . $ckit->current->raw);

    return [
        'title' => 'About',
        'text' => 'Cake sweet donut fruitcake sugar plum biscuit jelly beans. Jelly chocolate bar chupa chups chocolate cake candy canes oat cake gummies icing sweet roll. Powder pudding tootsie roll pudding cotton candy pie.',
        'intro' => 'Icing powder bear claw caramels. Topping biscuit muffin topping gingerbread apple pie caramels jelly-o. Carrot cake chocolate lollipop fruitcake danish chocolate pastry marshmallow.',
        'members' => [
            (object)[
                'image_url' => $image_url . '/people1.jpg',
                'title' => 'Tomas G. Ross',
                'position' => 'Community support',
                'text' => '',
                'phone' => '504-773-1605',
                'email' => 'TomasGRoss@rhyta.com',
            ],
            (object)[
                'image_url' => $image_url . '/people2.jpg',
                'title' => 'Ana G. Ivory',
                'position' => 'Wildlife officer',
                'text' => '',
                'phone' => '267-297-6796',
                'email' => 'AnaGIvory@jourrapide.com',
            ],
            (object)[
                'image_url' => $image_url . '/people3.jpg',
                'title' => 'Daryl D. Morano',
                'position' => 'Electronic technician',
                'text' => '',
                'phone' => '323-200-9720',
                'email' => 'DarylDMorano@dayrep.com',
            ],
            (object)[
                'image_url' => $image_url . '/people4.jpg',
                'title' => 'Tina M. Campbell',
                'position' => 'Interior designer',
                'text' => '',
                'phone' => '402-343-3555',
                'email' => 'TinaMCampbell@rhyta.com',
            ],
        ]
    ];
};