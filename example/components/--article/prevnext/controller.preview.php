<?php
return function() {
    $site_controller = ckitSiteController();

    $results = [
        'assets_path' => ckit::directory() . str_replace('/', DS, '/assets/svg/'),
        'paging' => (object)[
            'has_prev' => true,
            'has_next' => false,
            'prev_url' => '#',
            'next_url' => '#',
        ]
    ];

    return array_merge($site_controller, $results);
};