<?php
extract($data);
?>
<div class="main">
    <?php
    print_r($data);
    if(isset($filename)) : ?>
    <?php if($file_group == 'code') : ?>
        <?php snippet('ckit/main/views/file/code', ['data' => $data]); ?>
    <?php elseif($file_group == 'image') : ?>
    <?php endif; ?>
    <?php /*
    <?php if($file_group == 'code') : ?>
        
    <?php elseif(isset($data['filename']) && in_array(pathinfo($data['filename'])['extension'], $image_whitelist)) : ?>
        <?php
        foreach($data['flat'] as $item) {
            if($item['name'] == $data['name']) {
                $path = pathinfo($item['path'])['dirname'] . DS . $data['filename'];
            }
        }
        $imageData = base64_encode(file_get_contents($path));
        $src = 'data: '.mime_content_type($path).';base64,'.$imageData;
        echo '<div class="preview-image"><img src="' . $src . '"></div>';
        ?>
        */
        ?>
    <?php else : ?>
        <?= snippet('ckit/main/bar', ['data' => $data]); ?>
        <?= snippet('ckit/main/views/preview', ['data' => $data]); ?>
    <?php endif; ?>
</div>

<?php
/*
Markup
css
javascript
less
php
sass
yaml

coffiescript
haml
livescript
twig
markdown
json
*/