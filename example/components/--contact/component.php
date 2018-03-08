<?php snippet('header') ?>

  <main class="main" role="main">
    
    <header class="wrap">
      <h1><?= $title ?></h1>      
      <div class="intro text">
        <?= $intro ?>
      </div>    
      <hr />      
    </header>
    
    <div class="wrap wide">
      <h2>Get in Touch</h2>
      
      <ul class="contact-options">
        <?php foreach($contacts as $item): ?>
          <li class="contact-item column">
            <div class="contact-item-content">
              <img src="<?= $item->icon_url ?>" width="<?= $item->icon_width ?>" alt="<?= $item->title ?> icon" class="contact-item-icon" />
              <h3 class="contact-item-title"><?= $item->title ?></h3>
              <p class="contact-item-text">
                <?= $item->text ?>
              </p>
            </div>
            <p class="contact-item-action">
              <a href="<?= $item->url ?>" class="contact-action btn"><?= $item->linktext ?></a>
            </p>
          </li>
        <?php endforeach ?>
      </ul>
    </div>
      
    <div class="contact-twitter text wrap cf">
      <?= kirbytext($twitter) ?>
    </div>
    
  </main>

<?php snippet('footer') ?>