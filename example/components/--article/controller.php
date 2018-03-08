<?php
return function($site, $pages, $page) {
    $site_controller = ckitSiteController();
    $results = [
        'title' => $page->title()->html(),
        'date' => $page->date('F jS, Y'),
        'text' => $page->text(),
        'assets_path' => ckit::directory() . str_replace('/', DS, '/assets/svg/'),
        'paging' => (object)[
            'has_next' => $page->hasNextVisible(),
            'next_url' => ($page->hasNextVisible()) ? $page->nextVisible()->url() : null,
            'next_title' => ($page->hasNextVisible()) ? $page->nextVisible()->title()->html() : null,
            'has_prev' => $page->hasPrevVisible(),
            'prev_url' => ($page->hasPrevVisible()) ? $page->prevVisible()->url() : null,
            'prev_title' => ($page->hasPrevVisible()) ? $page->prevVisible()->title()->html() : null,
        ],
        'image_url' => ($page->coverimage()->toFile()) ? $page->coverimage()->toFile()->url() : null
    ];
    return array_merge($site_controller, $results);
};