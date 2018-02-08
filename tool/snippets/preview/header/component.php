<?php
namespace JensTornell\ComponentKit;
use c;

extract($data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <link rel="stylesheet" href="<?= u(settings::css()); ?>">
    <title><?= $name; ?> - Kirby Component Kit</title>
    <?php /*
    <link rel="icon" href="https://assets.getkirby.com/assets/images/favicon.png" type="image/png" />
    */
    ?>
    <link rel="stylesheet" href="<?= u('assets/plugins/kirby-component-kit/css/dist/preview.min.css'); ?>">

</head>
<body>