<?php extract($data['current']); ?>

<div class="preview">

    <iframe src="<?= $data['current']['preview_url']; ?>"></iframe>
</div>

<?= snippet('ckit/main/views/preview/actions', ['data' => $data]); ?>