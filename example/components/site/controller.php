<?php
return function($site, $pages, $page) {
    return [
        'site_title' => $site->title()->html(),
        'title' => $page->title()->html(),
    ];
};