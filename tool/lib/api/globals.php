<?php
namespace JensTornell\ComponentKit;
use ckit;

class GlobalsAPI {
    private $kirby;

    public function __construct() {
        global $kirby;
        $this->kirby = $kirby;
    }

    public function set() {
        $plugin_root = $this->toolPluginRoot();
        $this->kirby->set('option', 'ckit-tool', true);
        $results = (object)[
            'roots' => (object)[
                'components' => ckit::directory(),
                'template_raw' => str_replace('/', DS, $plugin_root . '/tool/components/--raw/component.php'),
                'template_tool' => str_replace('/', DS, $plugin_root . '/tool/components/--tool/component.php'),
                'assets' => ckit::assets(),
                'tool' => ckit::path(),
                'tool_components' => $this->toolComponentsRoot(),
                'tool_plugin' => $this->toolPluginRoot(),
            ],
            'whitelists' => $this->whitelists(),
            'urls' => (object)[
                'home' => u(ckit::path()),
                'css' => u(ckit::get('preview.css')),
                'js' => u(ckit::get('preview.js')),
            ],
            
        ];
        return $results;
    }

    public function whitelists() {
        return (object) [
            'code' => [
                'css',
                'coffee',
                'haml',
                'html',
                'js',
                'json',
                'less',
                'ls',
                'md',
                'sass',
                'scss',
                'php',
                'twig',
                'yaml',
                'yml',
            ],
            'image' => [
                'gif',
                'jpeg',
                'jpg',
                'png',
                'svg',
            ]
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