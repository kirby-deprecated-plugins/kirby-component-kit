<?php
return function($site, $pages, $page) {
  $site_controller = ckitSiteController();

  $perpage  = $page->perpage()->int();
  $articles = $page->children()
                   ->visible()
                   ->flip()
                   ->paginate(($perpage >= 1)? $perpage : 5);

  $results = [
    'title' => $page->title()->html(),
    'articles'   => $articles,
    'pagination' => $articles->pagination(),
  ];

  return array_merge($site_controller, $results);
};
