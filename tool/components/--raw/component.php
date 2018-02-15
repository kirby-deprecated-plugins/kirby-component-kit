<?php
namespace JensTornell\ComponentKit;
use str;

$Render = new Render(kirby());

$html = $Render->snippet($data['current']['path'] . DS . 'component.php', $data);

snippet('ckit/raw/header');
echo $html;
snippet('ckit/raw/footer');