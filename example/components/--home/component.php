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
  
    <section class="projects-section">
      
      <div class="wrap wide">
        <h2>Latest Projects</h2>
        <?php snippet('showcase', ['cases' => $items, 'limit' => 3]) ?>
        <p class="projects-section-more"><a href="<?= $projects_url ?>" class="btn">show all projects &hellip;</a></p>
      </div>
      
    </section>

  </main>

<?php snippet('footer') ?>