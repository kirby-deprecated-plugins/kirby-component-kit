<?php snippet('header') ?>

  <main class="main" role="main">

    <div class="wrap">
      
      <header>
        <h1><?= $title; ?></h1>
        <div class="intro text"><?= $intro; ?></div>
        <hr />
      </header>
      
      <div class="text">
        <?= $text; ?>
      </div>
      
    </div>
    
    <section class="team wrap wide">
      
      <h2>Our Team</h2>

      <ul class="team-list grid gutter-1">
        <?php foreach($members as $member): ?>
          <li class="team-item column">
            
            <figure class="team-portrait">
              <img src="<?= $member->image_url ?>" alt="Portrait of <?= $member->title ?>" />
            </figure>
            
            <div class="team-info">
              <h3 class="team-name"><?= $member->title ?></h3>
              <p class="team-position"><?= $member->position ?></p>
              <div class="team-about text">
                <?= $member->text ?>
              </div>
            </div>
            
            <div class="team-contact text">
              <i>Phone:</i><br />
              <?= kirbytag(['tel' => $member->phone]) ?><br />
              <i>Email:</i><br />
              <a href="mailto:<?= $member->email ?>"><?= $member->email ?></a><br />
            </div>
          </li>
        <?php endforeach ?>
      </ul>
      
    </section>

  </main>

<?php snippet('footer') ?>