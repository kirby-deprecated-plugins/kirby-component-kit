<?php
namespace JensTornell\ComponentKit;
use str;

$Render = new Render(kirby());
$html = $Render->snippet($data['current']['path'], $data);

snippet('ckit/raw/header');
echo $html;
snippet('ckit/raw/footer');