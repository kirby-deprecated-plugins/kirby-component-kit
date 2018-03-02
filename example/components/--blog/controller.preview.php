<?php
return function() use ($data) {
    $page = page('blog');
    $perpage  = $page->perpage()->int();
    $articles = $page->children()
                 ->visible()
                 ->flip()
                 ->paginate(($perpage >= 1)? $perpage : 5);

    return [
        'page' => $page,
        'articles' => $articles,
        'pagination' => $articles->pagination(),
        'assets_path' => $data->globals->roots->components . DS . 'icons' . DS,
    ];
};