<?php
extract($data);
    $filepath = pathinfo($current['path'])['dirname'] . DS . $filename;
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
<pre><code class="language-<?= $language; ?>"><?php echo htmlentities(file_get_contents($filepath)); ?></code></pre>