<?php
return function($site, $pages, $page) {
    $site_controller = ckitSiteController();

    foreach($page->images()->sortBy('sort', 'asc') as $image) {
        $images[] = (object)[
            'url' => $image->url(),
        ];
    }
    $results = [
        'title' => $page->title()->html(),
        'year' => $page->year(),
        'text' => $page->text(),
        'images' => $images,
    ];

    return array_merge($site_controller, $results);
};