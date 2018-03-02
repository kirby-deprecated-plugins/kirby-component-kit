<?php
namespace JensTornell\ComponentKit;

$raw = new Raw();
$html = $raw->html($data);
?>
<pre><code class="language-html"><?php echo htmlentities($html); ?></code></pre>