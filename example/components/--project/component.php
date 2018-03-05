<?php snippet('header') ?>

  <main class="main" role="main">
    
    <header class="wrap">
      <h1><?= $title ?></h1>
      <div class="intro text">
        <?= $year ?>
      </div>
      <hr />
    </header>
    
    <div class="text wrap">
      
      <?= kirbytext($text) ?>

      <?php
      // Images for the "project" template are sortable. You
      // can change the display by clicking the 'edit' button
      // above the files list in the sidebar.
      foreach($images as $image): ?>
        <figure>
          <img src="<?= $image->url ?>" alt="<?= $title ?>" />
        </figure>
      <?php endforeach ?>
      
    </div>
    
    <?php snippet('prevnext') ?>

  </main>

<?php snippet('footer') ?>