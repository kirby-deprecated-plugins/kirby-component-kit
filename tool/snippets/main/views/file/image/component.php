<?php
extract($data);
$url = u($route . '/image/' . $current['name'] . '?file=' . $filename);
?>
<div class="preview-image">
    <img src="<?= $url; ?>">
</div>