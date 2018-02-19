<div class="preview-image">
    <a href="<?= $data->image->url; ?>" target="_blank">
        <img src="<?= $data->image->url; ?>">
    </a>
</div>

<div class="image-info">
    <ul>
        <li><strong>Filesize:</strong> <?= $data->current->filesize_human; ?></li>
        <li><strong>Modified:</strong> <?php $data->current->file_modified; ?></li>
        <li><strong>Dimensions:</strong> <?php echo $data->image->dimensions; ?></li>
    </ul>
</div>