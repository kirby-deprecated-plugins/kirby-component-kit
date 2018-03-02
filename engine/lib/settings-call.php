<?php
class ckit {
    public static function get($name) {
        $SettingsClass = new \JensTornell\ComponentKit\SettingsClass($name);
        return $SettingsClass->get($name);
    }
    public static function __callStatic($name, $args) {
        $SettingsClass = new \JensTornell\ComponentKit\SettingsClass($name);
        return $SettingsClass->get($name);
    }
}