<?php
return function() use ($data) {
    $page = page('blog');
    $perpage  = $page->perpage()->int();
    $articles = $page->children()
                    ->visible()
                    ->flip()
                    ->paginate(($perpage >= 1)? $perpage : 5);
    $pagination = $articles->pagination();
    if($pagination->hasPages()) {
        $paging = [
            'prev_active' => $pagination->hasPrevPage(),
            'next_active' => $pagination->hasNextPage(),
            'prev_icon_url' => $assets_path . 'arrow-left.svg',
            'next_icon_url' => $assets_path . 'arrow-right.svg',
            'prev_url' => $pagination->prevPageURL(),
            'next_url' => $pagination->nextPageURL(),
        ];
    }

    return [
        'paging' => $paging,
    ];
};