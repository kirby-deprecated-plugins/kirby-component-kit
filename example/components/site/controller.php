<?php
return function($site, $pages, $page) {
    return [
        'site_title' => $site->title()->html(),
        'title' => $page->title()->html(),
        'meta_description' => $site->description()->html(),
        'lang' => $site->language() ? $site->language()->code() : 'en',
    ];
};