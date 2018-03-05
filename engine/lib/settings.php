<?php
namespace JensTornell\ComponentKit;
use c;
use ckit;

class SettingsClass {
    private $prefix = 'component.kit';
    private $defaults = [
        'assets' => true,
        'path' => 'component-kit',
        'directory' => null,
        'lock' => false,
        'preview.js' => false,
        'preview.css' => false,
        'tool.active' => true,
        'preview.background' => false,
        'preview.margin' => false,
        'preview.outline' => false,
        'component.snippet' => true,
    ];

    public function __construct() {
        $this->defaults['directory'] = kirby()->roots()->site() . DS . 'components';
    }

    public function get($name) {
        $value = c::get($this->prefix . '.' . $name, $this->defaults[$name]);
        switch($name) {
            case 'directory':
                $value = str_replace('/', DS, $value);
                break;
            case 'assets':
                $value = ($this->defaults[$name] === true) ? ckit::get('path') . '/assets' : $this->defaults[$name];
                break;
        }
        return $value;
    }
}