<?php
namespace JensTornell\ComponentKit;
use c;

class settings {
    static $site;
    static $name;
    static $prefix;
    static $settings;

    public static function __callStatic($name, $args) {
        self::$name = $name;
        self::$prefix = 'plugin.component.kit.';
        self::$settings = [
            'route'   => 'component-kit',
            'slug'  => 'sync',
            'token' => 'token',
        ];
        self::$site = [
            'components' => 'components'
        ];

        if(array_key_exists(self::$name, self::$settings)) {
            return self::config();
        } elseif(array_key_exists(self::$name, self::$site)) {
            return self::site();
        }
    }

    public static function config() {
        return c::get(self::$prefix . self::$name, self::$settings[self::$name]);
    }

    public static function site() {
        $root = kirby()->roots()->components();
        return (!isset($root)) ? kirby()->roots()->site() . DS . self::$site[self::$name] : kirby()->roots()->component();
    }
}