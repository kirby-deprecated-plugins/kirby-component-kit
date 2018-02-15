<div class="preview-image">
    <a href="<?= $data['current']['url']; ?>" target="_blank">
        <img src="<?= $data['current']['url']; ?>">
    </a>
</div>

<?php
function human_filesize($bytes, $decimals = 2) {
    $sz = 'BKMGTP';
    $factor = floor((strlen($bytes) - 1) / 3);
    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor];
}
?>

<?php $dimensions = getimagesize($data['current']['filepath']); ?>
<div class="image-info">
    <ul>
        <li><strong>Filesize:</strong> <?= human_filesize(filesize($data['current']['filepath'])); ?></li>
        <li><strong>Modified:</strong> <?php $date = date('Y-m-d, H:i', filemtime($data['current']['filepath'])); echo $date; ?></li>
        <li><strong>Dimensions:</strong> <?php echo $dimensions[0] . ' x ' . $dimensions[1]; ?></li>
    </ul>
</div>