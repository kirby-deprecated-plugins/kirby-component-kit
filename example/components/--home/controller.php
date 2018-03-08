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
        'intro' => $page->intro(),
        'text' => $page->text(),
        'projects_url' => page('projects')->url(),
        'items' => $items
    ];

    return array_merge($site_controller, $results);
};