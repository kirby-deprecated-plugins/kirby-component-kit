<?php
return function($site, $pages, $page) {
    $site_controller = ckitSiteController();

    $projects = page('projects')->children()->visible();

    foreach($projects as $project) {
        $image = $project->images()->sortBy('sort', 'asc')->first();
        if($image) {
            $thumb = $image->crop(600, 600);
        }
        $items[] = (object)[
            'url' => $project->url(),
            'title' => $project->title()->html(),
            'image_url' => ($thumb) ? $thumb->url() : null,
        ];
    }

    $results = [
        'title' => $page->title()->html(),
        'text' => $page->text(),
        'items' => $items
    ];

    return array_merge($site_controller, $results);
};