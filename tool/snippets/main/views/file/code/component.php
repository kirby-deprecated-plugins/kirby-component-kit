<?php
extract($data);
    foreach($data['flat'] as $item) {
        if($item['name'] == $data['name']) {
            $path = pathinfo($item['path'])['dirname'] . DS . $data['filename'];
        }
    }

    $filepath = pathinfo($current['path'])['dirname'] . DS . $filename;

    echo $filepath; die;
    // Filename path
    // Filename extension
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