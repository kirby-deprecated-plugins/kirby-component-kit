<?php
namespace JensTornell\ComponentKit;
use str;

$Render = new Render(kirby());
$controller_preview = $data->current->component_root . DS . 'controller.preview.php';

$params = [];

if(file_exists($controller_preview)) {
    $params = require_once $controller_preview;
}

$html = $Render->snippet($data->current->filepath, $params);

snippet('ckit/raw/header');
echo $html;
snippet('ckit/raw/footer');