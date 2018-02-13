<?php
namespace JensTornell\ComponentKit;

$Render = new Render(kirby());
$html = $Render->snippet($data['current']['path'], $data);
?>
<pre><code class="language-html"><?php echo htmlentities($html); ?></code></pre>