<?php
return function() use ($ckit) {
    $image_url = u(ckit::assets() . '/' . $ckit->current->raw);
    return [
        'title' => 'Project',
        'text' => 'Liquorice chupa chups ice cream ice cream cake. Pudding pudding lollipop. Tart sesame snaps pie gummies ice cream gummi bears tootsie roll bear claw wafer.',
        'year' => '2012',
        'images' => [
            (object)[
                'url' => $image_url . '/image1.jpg'
            ],
            (object)[
                'url' => $image_url . '/image2.jpg'
            ],
        ]
    ];
};