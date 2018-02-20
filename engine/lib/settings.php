<?php
namespace JensTornell\ComponentKit;
use c;

class SettingsClass {
    private $prefix = 'component.kit';
    private $defaults = [
        'path' => 'component-kit',
        'directory' => null,
        'lock' => false,
        'preview.js' => false,
        'preview.css' => false,
        'tool.active' => true,
    ];

    public function __construct() {
        $this->defaults['directory'] = kirby()->roots()->site() . DS . 'components';
    }

    public function get($name) {
        return c::get($this->prefix . '.' . $name, $this->defaults[$name]);
    }
}

class settings {
    public static function get($name) {
        $SettingsClass = new SettingsClass($name);
        return $SettingsClass->get($name);
    }
    public static function __callStatic($name, $args) {
        $SettingsClass = new SettingsClass($name);
        return $SettingsClass->get($name);
    }
}