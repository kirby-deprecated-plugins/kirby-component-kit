<?php extract($data['current']); ?>
<pre><code class="language-<?= $filetype; ?>"><?php echo htmlentities(file_get_contents($filepath)); ?></code></pre>

<div class="image-info">
    <ul>
        <li><strong>Filesize:</strong> <?= $data['current']['info']['filesize']; ?></li>
        <li><strong>Modified:</strong> <?php $date = date('Y-m-d, H:i', filemtime($data['current']['filepath'])); echo $date; ?></li>
    </ul>
</div>