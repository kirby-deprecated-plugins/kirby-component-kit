<?php
namespace JensTornell\ComponentKit;

class Globals {
    private $kirby;

    public function __construct() {
        global $kirby;
        $this->kirby = $kirby;
    }

    public function set() {
        return (object)[
            'roots' => (object)[
                'components' => settings::directory(),
                'tool' => settings::path(),
                'tool_components' => $this->toolComponentsRoot(),
                'tool_plugin' => $this->toolPluginRoot(),
            ],
            'urls' => (object)[
                'home' => u(settings::path()),
                'css' => settings::get('preview.css'),
                'js' => settings::get('preview.js'),
            ],
        ];
    }

    // Tool plugin root
    protected function toolPluginRoot() {
        return kirby()->roots()->plugins() . '/kirby-component-kit';
    }

    // Tool component root
    protected function toolComponentsRoot() {
        return str_replace('/', DS, $this->toolPluginRoot() . '/tool/components');
    }
}