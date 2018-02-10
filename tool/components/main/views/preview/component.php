<?php extract($data); ?>
<?php if(isset($name)) : ?>
    <div class="preview">
        <iframe src="<?= u('component-kit/raw/' . $name); ?>"></iframe>
    </div>
<?php endif; ?>

<?= snippet('ckit/main/views/preview/actions', ['data' => $data]); ?>