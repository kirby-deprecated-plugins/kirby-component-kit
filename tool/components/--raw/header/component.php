<?php
namespace JensTornell\ComponentKit;
use c;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <link rel="stylesheet" href="<?= $data->globals->urls->css; ?>">
    <title><?= $data->current->id; ?> - Kirby Component Kit</title>
    <link rel="icon" href="<?= u('assets/plugins/kirby-component-kit/png/favicon.png'); ?>" type="image/png" />

    <?= css('assets/plugins/kirby-component-kit/css/dist/preview.min.css'); // For tool settings ?>
</head>
<body>