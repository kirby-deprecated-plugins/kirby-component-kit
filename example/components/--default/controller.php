<?php
return function($site, $pages, $page) {
    $site_controller = ckitSiteController();

    $results = [
        'title' => $page->title()->html(),
        'intro' => $page->intro(),
        'text' => $page->text()
    ];

    return array_merge($site_controller, $results);
};