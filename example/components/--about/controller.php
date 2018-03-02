<?php
return function($site, $pages, $page) {
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

    return [        
        'title' => $page->title()->html(),
        'text' => $page->text()->kirbytext(),
        'intro' => $page->intro()->kirbytext(),
        'members' => $members
    ];
};