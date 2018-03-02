<?php
namespace JensTornell\ComponentKit;
use ckit;

require_once __DIR__ . DS . 'engine' . DS . 'engine.php';

if(ckit::get('tool.active') && (!ckit::lock() || site()->user())) {
    require_once __DIR__ . DS . 'tool' . DS . 'tool.php';
}