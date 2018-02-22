<?php
namespace JensTornell\ComponentKit;
use str;

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

$html = $Render->snippet($data->current->filepath, $params);

snippet('ckit/raw/header');
echo $html;
snippet('ckit/raw/footer');