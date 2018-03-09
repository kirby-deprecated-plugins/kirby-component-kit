<?php
return function($site, $pages, $page) {
  $site_controller = ckitSiteController();

  $perpage  = $page->perpage()->int();
  $articles = $page->children()
                   ->visible()
                   ->flip()
                   ->paginate(($perpage >= 1)? $perpage : 5);
  $pagination = $articles->pagination();
  $assets_path = ckit::directory() . str_replace('/', DS, '/assets/svg/');

  foreach($articles as $article) {
    if($article->coverimage()->toFile()) {
      $image_url = $article->coverimage()->toFile()->url();
    }

    $items[] = (object)[
      'title' => $article->title()->html(),
      'date' => $article->date('F jS, Y'),
      'excerpt' => $article->text()->kirbytext()->excerpt(50, 'words'),
      'image_url' => $image_url,
      'url' => $article->url()
    ];
  }

  $results = [
    'title' => $page->title()->html(),
    'articles'   => $items,    
    'paging' => (object)[
      'prev_active' => $pagination->hasPrevPage(),
      'next_active' => $pagination->hasNextPage(),
      'prev_icon_url' => $assets_path . 'arrow-left.svg',
      'next_icon_url' => $assets_path . 'arrow-right.svg',
      'prev_url' => $pagination->prevPageURL(),
      'next_url' => $pagination->nextPageURL(),
    ]
  ];

  return array_merge($site_controller, $results);
};
/*
if($pagination->page() == 1):

  /*<?php if($articles->count()): ?>

            <div class="text">
              <p>
                <a href="<?= $article->url() ?>" class="article-more">read more</a>
              </p>
            </div>
*/