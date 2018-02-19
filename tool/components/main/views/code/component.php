<pre><code class="language-<?= $data->current->filetype; ?>"><?php echo htmlentities(file_get_contents($data->current->filepath)); ?></code></pre>

<div class="image-info">
    <ul>
        <li><strong>Filesize:</strong> <?= $data->current->filesize_human; ?></li>
        <li><strong>Modified:</strong> <?= $data->current->modified; ?></li>
    </ul>
</div>