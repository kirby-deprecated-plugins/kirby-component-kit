<?php extract($data['current']); ?>
<pre><code class="language-<?= $filetype; ?>"><?php echo htmlentities(file_get_contents($path)); ?></code></pre>