<?php
namespace JensTornell\ComponentKit;

require_once __DIR__ . DS . 'engine' . DS . 'engine.php';

if(!settings::lock()) {
    require_once __DIR__ . DS . 'tool' . DS . 'tool.php';
}