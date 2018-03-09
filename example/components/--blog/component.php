<?php snippet('header') ?>

  <main class="main" role="main">

    <header class="wrap">
      <h1><?= $title ?></h1>

      <?php
      // This page uses a separate controller to set variables, which can be used
      // within this template file. This results in less logic in your templates,
      // making them more readable. Learn more about controllers at:
      // https://getkirby.com/docs/developer-guide/advanced/controllers
      
      if($paging->current == 1) :
      ?>
        <div class="intro text">
          <?= kirbytext($text) ?>
        </div>
      <?php endif ?>

      <hr />
    </header>

    <section class="wrap">
      <?php if(count($articles)): ?>
        <?php foreach($articles as $article): ?>

          <article class="article index">

            <header class="article-header">
              <h2 class="article-title">
                <a href="<?= $article->url ?>"><?= $article->title ?></a>
              </h2>

              <p class="article-date"><?= $article->date ?></p>
            </header>

            <?php snippet('coverimage', ['image_url' => $article->image_url]) ?>

            <div class="text">
              <p>
                <?= $article->excerpt ?>
                <a href="<?= $article->url ?>" class="article-more">read more</a>
              </p>
            </div>
          </article>

          <hr />

        <?php endforeach ?>
      <?php else: ?>
        <p>This blog does not contain any articles yet.</p>
      <?php endif ?>
    </section>

    <?php snippet('blog/pagination') ?>

  </main>

<?php snippet('footer') ?>