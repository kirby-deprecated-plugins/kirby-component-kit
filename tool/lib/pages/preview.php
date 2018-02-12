<?php
namespace JensTornell\ComponentKit;
use response;
use tpl;

class Preview extends View {
    public function run($id) {
        $args = $this->args($id);

        $args['data']['title'] = $id . ' - Component Kit';
        $args['data']['preview_url'] = $this->url($id, 'preview');
        $args['data']['raw_url'] = $this->url($id, 'raw');
        $args['data']['html_url'] = $this->url($id, 'html');

        return $this->response($args);
    }

    protected function response($args) {
        $basepath = kirby()->roots()->plugins() . DS . 'kirby-component-kit';
        $path = $basepath . DS . 'tool' . DS . 'components' . DS . 'templates' . DS . 'home' . DS . 'component.php';

        $Render = new Render(kirby());
        $html = $Render->snippet($path, $args);

        return new Response(trim($html), 'html', 200);
    }
}