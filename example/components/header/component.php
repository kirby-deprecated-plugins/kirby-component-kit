<!doctype html>
<html lang="<?= $lang ?>">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <title><?= $site_title ?> | <?= $title ?></title>
  
  <meta name="description" content="<?= $meta_description ?>">

  <?= css('assets/css/index.css') ?>

</head>
<body>

  <header class="header wrap wide" role="banner">
    <div class="grid">

      <div class="branding column">
        <a href="<?= url() ?>" rel="home"><?= $site_title ?></a>
      </div>

      <?php snippet('header/menu') ?>

    </div>
  </header>
  