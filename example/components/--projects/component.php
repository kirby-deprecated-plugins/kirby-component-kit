<?php snippet('header') ?>

  <main class="main" role="main">

    <header class="wrap">
      <h1><?= $title ?></h1>
      <div class="intro text">
        <?= kirbytext($text) ?>
      </div>
      <hr />
    </header>
      
    <div class="wrap wide">    
      <?php snippet('showcase', ['cases' => $items]) ?>
    </div>

  </main>

<?php snippet('footer') ?>