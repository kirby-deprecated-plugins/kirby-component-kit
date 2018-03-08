<?php snippet('header') ?>

  <main class="main" role="main">

    <header class="wrap">
      <h1><?= $title ?></h1>
      <div class="intro text">
        <?= kirbytext($intro) ?>
      </div>
      <hr />
    </header>
      
    <div class="text wrap">
      <?= kirbytext($text) ?>
    </div>

  </main>

<?php snippet('footer') ?>