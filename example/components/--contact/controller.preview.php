<?php
return function() use ($ckit) {
    $image_url = u(ckit::assets() . '/' . $ckit->current->raw);
    return [
        'title' => 'Contact',
        'text' => 'Sweet roll pudding cake sugar plum sugar plum sesame snaps. Gummies chupa chups dragée candy. Chocolate bear claw candy sweet.',
        'intro' => 'Cake jelly cupcake. Tootsie roll jujubes pastry toffee. Lemon drops chocolate cake tiramisu jujubes soufflé carrot cake. Dragée lollipop gummies biscuit sesame snaps.',
        'contacts' => [
            (object)[
                'icon_url' => $image_url . '/icon1.svg',
                'icon_width' => '',
                'title' => 'Ice cream',
                'text' => 'Muffin lemon drops cheesecake lemon drops cake.',
                'url' => '#',
                'linktext' => 'Read more',
            ],
            (object)[
                'icon_url' => $image_url . '/icon2.svg',
                'icon_width' => '',
                'title' => 'Ice cream',
                'text' => 'Donut gingerbread donut jelly sugar plum soufflé cookie danish.',
                'url' => '#',
                'linktext' => 'Article',
            ],
            (object)[
                'icon_url' => $image_url . '/icon3.svg',
                'icon_width' => '',
                'title' => 'Ice cream',
                'text' => 'Icing pie icing pudding cake cheesecake.',
                'url' => '#',
                'linktext' => 'More info',
            ],
            (object)[
                'icon_url' => $image_url . '/icon4.svg',
                'icon_width' => '',
                'title' => 'Ice cream',
                'text' => 'Jelly beans marzipan chocolate cake candy.',
                'url' => '#',
                'linktext' => 'Information',
            ],
        ],
    ];
};