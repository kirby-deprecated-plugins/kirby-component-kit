<?php
namespace JensTornell\ComponentKit;

require_once __DIR__ . DS . 'engine' . DS . 'engine.php';

if(settings::get('tool.active') && (!settings::lock() || site()->user())) {
    require_once __DIR__ . DS . 'tool' . DS . 'tool.php';
} else {
    $snippet = new Snippet();
    $snippet->run();
}