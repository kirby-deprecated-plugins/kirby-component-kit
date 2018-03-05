<?php
return function($site, $pages, $page) {
    foreach($page->contactoptions()->toStructure() as $item) {
        $icon = $page->image($item->icon());
        $contacts = [
            'icon_url' => $icon->url(),
            'icon_width' => $icon->width(),
            'title' => $item->title()->html(),
            'text' => $item->text()->html(),
            'url' => $item->url(),
            'linktext' => $item->linktext(),
        ];
    }
    return [
        'title' => $page->title()->html(),
        'text' => $page->text()->kirbytext(),
        'intro' => $page->intro()->kirbytext(),
        'contacts' => $contacts,
    ];
};