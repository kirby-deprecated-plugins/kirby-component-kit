<div class="preview-image">
    <a href="<?= $data->image->url; ?>" target="_blank">
        <img src="<?= $data->image->url; ?>" class="<?= str::slug($data->current->content_type); ?>">
    </a>
</div>

<div class="image-info">
    <ul>
        <li><strong>Filesize:</strong> <?= $data->current->filesize_human; ?></li>
        <li><strong>Modified:</strong> <?= $data->current->modified; ?></li>
        <li><strong>Dimensions:</strong> <?php echo $data->image->dimensions; ?></li>
    </ul>
</div>