<?php snippet('header') ?>

  <main class="main" role="main">
    
    <article class="article single wrap">

      <header class="article-header">
        <h1><?= $title ?></h1>
        <div class="intro text">
          <?= $date ?>
        </div>
        <hr />
      </header>
      
      <?php snippet('coverimage', ['image_url', $image_url]) ?>
      
      <div class="text">
        <?= kirbytext($text) ?>
      </div>
      
    </article>
    
    <?php snippet('article/prevnext', ['flip' => true, 'paging' => $paging]) ?>
    
  </main>

<?php snippet('footer') ?>