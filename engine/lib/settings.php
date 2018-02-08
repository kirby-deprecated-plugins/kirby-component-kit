<?php
namespace JensTornell\ComponentKit;
use c;

class settings {
    public static function __callStatic($name, $args) {
        $SettingsClass = new SettingsClass($name);
        return $SettingsClass->get($name);
    }
}

class SettingsClass {
    // Set defaults
    private function defaults() {
        $defaults = [
            'config' => [
                'route' => 'component-kit',
                'lock' => false,
                'js' => false,
                'css' => false
            ],
            'roots' => [
                'components' => $this->kirby->roots()->site() . DS . 'components'
            ]
        ];
        return $defaults;
    }

    public function set($name) {
        global $kirby;
        $this->kirby = $kirby;

        $this->prefix = 'plugin.component.kit';
        $this->defaults = $this->defaults();
        $this->name = $name;
    }

    // Get and return setting value
    public function get($name) {
        $this->set($name);

        if($this->is('config')) return $this->config();
        if($this->is('roots')) return $this->site('roots');
        if($this->is('urls')) return $this->site('urls');
    }

    // Is type
    private function is($type) {
        return array_key_exists($this->name, $this->defaults[$type]); 
    }

    // Get config value from config.php
    private function config() {
        return c::get($this->prefix . '.' . $this->name, $this->defaults['config'][$this->name]);
    }

    // Get url value from site.php
    private function site($type) {
        $path = $this->kirby->{$type}()->{$this->name}();

        if(isset($path)) return $path;
        return $this->defaults[$type][$this->name];
    }
}