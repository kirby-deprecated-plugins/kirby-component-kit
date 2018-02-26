<!doctype html>
<html lang="<?= site()->language() ? site()->language()->code() : 'en' ?>">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <title><?= $seo_title ?></title>
  <meta name="description" content="<?= $seo_description ?>">

  <?= css('assets/css/index.css') ?>

</head>
<body>

  <header class="header wrap wide" role="banner">
    <div class="grid">

      <div class="branding column">
        <a href="<?= url() ?>" rel="home"><?= $site->title()->html() ?></a>
      </div>

      <?php snippet('menu') ?>

    </div>
  </header>

<?php # $site->title()->html() | $page->title()->html()
/* $site->description()->html() */
?>