<?php
return function($site, $pages, $page) {
    $site_controller = ckitSiteController();

    foreach($page->children()->visible() as $member) {
        $members[] = (object)[
            'image_url' => $member->image()->url(),
            'title' => $member->title()->html(),
            'position' => $member->position()->html(),
            'text' => $member->about()->kirbytext(),
            'phone' => kirbytag(['tel' => $member->phone()->html()]),
            'email' => $member->email()->html(),
        ];
    }

    $results = [
        'title' => $page->title()->html(),
        'text' => $page->text()->kirbytext(),
        'intro' => $page->intro()->kirbytext(),
        'members' => $members,
    ];

    return array_merge($site_controller, $results);
};