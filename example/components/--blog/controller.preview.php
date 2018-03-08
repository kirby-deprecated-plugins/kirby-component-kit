<?php
return function() {
    $site_controller = ckitSiteController();

    $assets_path = u(ckit::assets() . '/assets/svg');
    $paging = [
        'prev_active' => true,
        'next_active' => false,
        'prev_icon_url' => $assets_path . '/arrow-left.svg',
        'next_icon_url' => $assets_path . '/arrow-right.svg',
        'prev_url' => '#',
        'next_url' => '#',
    ];

    $results = [
        'title' => 'Blog',
        'text' => 'Jujubes chocolate cake dragée. Candy chupa chups sesame snaps carrot cake jelly-o. Pastry croissant chocolate cake. Marshmallow marshmallow chupa chups donut oat cake powder.',
        'paging' => $paging,
        'assets_path' => $assets_path,
    ];

    return array_merge($site_controller, $results);
};