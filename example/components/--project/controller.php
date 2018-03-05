<?php
return function($site, $pages, $page) {
    foreach($page->images()->sortBy('sort', 'asc') as $image) {
        $images[] = [
            'url' => $image->url(),
        ];
    }
    return [
        'title' => $page->title()->html(),
        'year' => $page->year(),
        'text' => $page->text(),
        'images' => $images,
    ];
};