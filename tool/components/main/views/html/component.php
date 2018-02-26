<?php
namespace JensTornell\ComponentKit;

$Render = new Render(kirby());
$controller_preview = $data->current->component_root . DS . 'controller.preview.php';
$component_preview = $data->current->component_root . DS . 'component.preview.php';

$params = [];

if(file_exists($controller_preview)) {
    $params = require_once $controller_preview;
}

if(file_exists($component_preview)) {
    $filepath = dirname($data->current->filepath) . DS . 'component.preview.php';
}

#$Render = new Render(kirby());
$html = $Render->snippet($data->current->filepath, $params);
?>
<pre><code class="language-html"><?php echo htmlentities($html); ?></code></pre>