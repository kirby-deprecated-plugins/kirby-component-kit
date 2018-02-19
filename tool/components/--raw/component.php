<?php
namespace JensTornell\ComponentKit;
use str;

$Render = new Render(kirby());

$html = $Render->snippet($data->current->filepath, ['data' => $data]);

snippet('ckit/raw/header');
echo $html;
snippet('ckit/raw/footer');