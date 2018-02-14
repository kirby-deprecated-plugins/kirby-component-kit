<?php
namespace JensTornell\ComponentKit;
use c;

class SettingsClass {
    private $prefix = 'plugin.component.kit';
    private $defaults = [
        'route' => 'component-kit',
        'lock' => false,
        'js' => false,
        'css' => false
    ];

    public function __construct() {
        $this->defaults['directory'] = kirby()->roots()->site() . DS . 'components';
    }

    public function get($name) {
        return c::get($this->prefix . '.' . $name, $this->defaults[$name]);
    }
}

class settings {
    public static function __callStatic($name, $args) {
        $SettingsClass = new SettingsClass($name);
        return $SettingsClass->get($name);
    }
}