<?php
namespace JensTornell\ComponentKit;
use response;
use tpl;

class Html extends View {
    public function run($id) {
        $args = $this->args($id);

        $args['title'] = '';
        $args['data']['preview_url'] = $this->url($id, 'preview');
        $args['data']['raw_url'] = $this->url($id, 'raw');
        $args['data']['html_url'] = $this->url($id, 'html');

        return $this->response($args);
    }

    protected function response($args) {
        $basepath = kirby()->roots()->plugins() . DS . 'kirby-component-kit';
        $path = $basepath . DS . 'tool' . DS . 'templates' . DS . 'home.php';

        return new Response(tpl::load($path, ['data' => $args]), 'html', 200);
    }
}