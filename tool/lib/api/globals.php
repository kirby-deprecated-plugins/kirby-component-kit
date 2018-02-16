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
            'core' => (object)[
                'roots' => (object)[
                    'components' => settings::directory(),
                ]
            ],
            'tool' => (object)[
                'path' => settings::path(),
                'urls' => (object)[
                    'home' => u(settings::path()),
                    'css' => settings::get('preview.css'),
                    'js' => settings::get('preview.js'),
                ],
                'roots' => (object)[
                    'plugin' => $this->toolPluginRoot(),
                    'components' => $this->toolComponentsRoot()
                ],
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