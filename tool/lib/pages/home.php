<?php
namespace JensTornell\ComponentKit;
use response;
use tpl;

class Home extends View {
    public function run() {
        $args = $this->args(null);
        $args['title'] = 'Kirby Component Kit';

        return $this->response('templates' . DS . 'home' . DS . 'component.php', $args);
    }

    protected function args($id) {
        $flat = $this->coreComponentsFlat();
        $args = [
            'route' => settings::path(),
            'flat' => $flat,
            'paths' => $this->coreComponentsArray(),
            'root' => $this->tool_components_root,
        ];
        return $args;
    }
}