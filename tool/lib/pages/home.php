<?php
namespace JensTornell\ComponentKit;
use response;
use tpl;

class Home extends View {
    public function run() {
        $args = $this->args(null);
        $args['title'] = 'Kirby Component Kit';

        return $this->response($args);
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

    protected function response($args) {
        $basepath = kirby()->roots()->plugins() . DS . 'kirby-component-kit';
        $path = $basepath . DS . 'tool' . DS . 'components' . DS . 'templates' . DS . 'home' . DS . 'component.php';

        $Render = new Render(kirby());
        $html = $Render->snippet($path, $args);

        return new Response(trim($html), 'html', 200);
    }
}