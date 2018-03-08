<?php
function ckitSiteController() {
    global $kirby;
    $site = $kirby->site;
    $page = page();

    $filepath = ckit::directory() . DS . 'site' . DS . 'controller.php';

    if(!file_exists($filepath)) return $data;
    $callback = require_once $filepath;

    return $callback($site, $site->children(), $page);
}