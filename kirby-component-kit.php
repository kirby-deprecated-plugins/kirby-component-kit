<?php
namespace JensTornell\ComponentKit;
use ckit;
use url;
use str;

require_once __DIR__ . DS . 'engine' . DS . 'engine.php';

$ckit_url = u(ckit::path());
$filepath = url::base() . $_SERVER['REQUEST_URI'];

if(str::startsWith($filepath, $ckit_url)) {
    require_once __DIR__ . str_replace('/', DS, '/tool/lib/snippet.php');

    if(ckit::get('tool.active') && (!ckit::lock() || site()->user())) {
        require_once __DIR__ . str_replace('/', DS, '/tool/tool.php');
    }
} else {
    $snippet = new Snippet();
    $snippet->run();
}