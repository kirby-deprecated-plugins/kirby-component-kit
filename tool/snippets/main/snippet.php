<div class="main">
    <?php
    $code_whitelist = [
        'css', 'js', 'scss', 'sass', 'less', 'php', 'yaml', 'yml'
    ];
    $image_whitelist = [
        'jpg', 'jpeg', 'png', 'gif'
    ];
    if(isset($data['filename']) && in_array(pathinfo($data['filename'])['extension'], $code_whitelist)) : ?>
        <?php
        foreach($data['flat'] as $item) {
            if($item['name'] == $data['name']) {
                $path = pathinfo($item['path'])['dirname'] . DS . $data['filename'];
            }
        }
        $language = pathinfo($data['filename'])['extension'];
        switch($language) {
            case 'yml':
                $language = 'yaml';
                break;
            case 'scss':
                $language = 'sass';
                break;
        }
        ?>
        <pre><code class="language-<?= $language; ?>"><?php echo htmlentities(file_get_contents($path)); ?></code></pre>
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