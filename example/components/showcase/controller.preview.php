<?php
return function() use ($ckit) {
    $image_url = u(ckit::assets() . '/showcase');
    $cases = [
        (object)[
            'url' => '#',
            'title' => 'Case 1',
            'image_url' => $image_url . '/case1.jpg',
        ],
        (object)[
            'url' => '#',
            'title' => 'Case 2',
            'image_url' => $image_url . '/case2.jpg',
        ],
        (object)[
            'url' => '#',
            'title' => 'Case 3',
            'image_url' => $image_url . '/case3.jpg',
        ],
        (object)[
            'url' => '#',
            'title' => 'Case 4',
            'image_url' => $image_url . '/case4.jpg',
        ],
        (object)[
            'url' => '#',
            'title' => 'Case 5',
            'image_url' => $image_url . '/case5.jpg',
        ],
    ];

    return [
        'cases' => $cases
    ];
};

/*
return function() {
    $projects = page('projects')->children()->visible();
    #if(isset($limit)) $projects = $projects->limit($limit);
    $image = $project->images()->sortBy('sort', 'asc')->first();
    if($image) {
        $thumb = $image->crop(600, 600);
    }

    foreach($projects as $project) {
        $cases[] = [
            'url' => $project->url(),
            'title' => $project->title()->html(),
            'image_url' => ($thumb) ? $thumb->url() : null,
        ];
    }

    return [
        'limit' => (isset($limit)) ? $limit : null,
        'cases' => $cases,
    ];
};
*/