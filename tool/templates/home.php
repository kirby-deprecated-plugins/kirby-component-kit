<?php extract($data); ?>
<?= snippet('ckit/header', ['data' => $data]); ?>

<div class="wrap">
    <?= snippet('ckit/aside', ['data' => $data]); ?>
    <?= snippet('ckit/main', ['data' => $data]); ?>
</div>

<?= snippet('ckit/footer'); ?>