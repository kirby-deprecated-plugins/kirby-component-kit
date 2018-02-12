<?php
namespace JensTornell\ComponentKit;
use str;

$Render = new Render(kirby());
$html = $Render->snippet($data['current']['path'], $data);

snippet('ckit/preview/header');
echo $html;
snippet('ckit/preview/footer');