<?php
return function() use ($data) {
    $page = page('blog');
    $perpage  = $page->perpage()->int();
    $articles = $page->children()
                    ->visible()
                    ->flip()
                    ->paginate(($perpage >= 1)? $perpage : 5);

    return [
        'pagination' => $articles->pagination(),
    ];
};