<?php
return function($site, $pages, $page) {
    $site_controller = ckitSiteController();

    foreach($page->contactoptions()->toStructure() as $item) {
        $icon = $page->image($item->icon());
        $contacts[] = (object)[
            'icon_url' => $icon->url(),
            'icon_width' => $icon->width(),
            'title' => $item->title()->html(),
            'text' => $item->text()->html(),
            'url' => $item->url(),
            'linktext' => $item->linktext(),
        ];
    }
    $results = [
        'title' => $page->title()->html(),
        'intro' => $page->intro()->kirbytext(),
        'twitter' => $page->text(),
        'contacts' => $contacts,
    ];

    return array_merge($site_controller, $results);
};