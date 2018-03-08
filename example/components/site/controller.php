<?php
return function($site, $pages, $page) {
    foreach($pages->visible() as $item) {
        $items[] = (object)[
            'url' => $item->url(),
            'title' => $item->title()->html(),
            'class' => r($item->isOpen(), ' is-active'),
        ];
    }
    return [
        'site_title' => $site->title()->html(),
        'title' => $page->title()->html(),
        'meta_description' => $site->description()->html(),
        'lang' => $site->language() ? $site->language()->code() : 'en',
        'menu' => $items,
        'copyright' => html::decode($site->copyright()->kirbytext()),
    ];
};