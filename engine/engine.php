<?php
namespace JensTornell\ComponentKit;

require_once __DIR__ . DS . 'lib' . DS . 'settings.php';
require_once __DIR__ . DS . 'lib' . DS . 'settings-call.php';
require_once __DIR__ . DS . 'lib' . DS . 'registry.php';
require_once __DIR__ . DS . 'lib' . DS . 'routes.php';

$snippet = new Snippet();
$snippet->run();