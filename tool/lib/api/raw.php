<?php
namespace JensTornell\ComponentKit;
use str;

class Raw {
    public function __construct() {
        $this->site = site();
    }
    function html($ckit) {
        $params = $this->siteController($ckit);

        $controller_preview = $ckit->current->component_root . DS . 'controller.preview.php';
        if(file_exists($controller_preview)) {
            $callback = require_once $controller_preview;
            $callback_params = $callback($this->site, null, null);
            $params = array_merge($params, $callback_params);
        }

        if($ckit->current->type == 'template') {
            kirby()->set('option', 'ckit.results', $params);
        }

        $Render = new Render(kirby());
        return $Render->snippet($ckit->current->filepath, $params);
    }

    private function siteController($data) {
        $filepath = $data->globals->roots->components . DS . 'site' . DS . 'controller.preview.php';
        if(!file_exists($filepath)) return [];
        $callback = require_once $filepath;
        $params = $callback($this->site, null, null);
        return $params;
    }

    public function complete($data) {
        if($data->current->filename == 'component.php' && $data->current->type == 'snippet') {
            $output = snippet('ckit/raw/header') . '{{ckit}}' . snippet('ckit/raw/footer');
            $output = str_replace('{{ckit}}', $this->html($data), $output);
        } else {
            $output = $this->html($data);
        }
        
        return $output;
    }
}