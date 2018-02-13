<?php extract($data['current']); ?>

<div class="preview">
    <iframe src="<?= u('component-kit/raw/' . $id); ?>"></iframe>
</div>

<?= snippet('ckit/main/views/preview/actions', ['data' => $data]); ?>