<?php
return function() use ($ckit) {
    $assets_path = u(ckit::assets() . '/assets/svg');
    $paging = [
        'prev_active' => true,
        'next_active' => false,
        'prev_icon_url' => $assets_path . '/arrow-left.svg',
        'next_icon_url' => $assets_path . '/arrow-right.svg',
        'prev_url' => '#',
        'next_url' => '#',
    ];

    return [
        'paging' => (object)$paging,
    ];
};