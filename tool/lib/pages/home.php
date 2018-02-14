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

    protected function args($uid) {
        $flat = $this->Helpers->coreSnippetArray();
        $args = [
            'route' => settings::path(),
            'flat' => $flat,
            'paths' => $this->Helpers->coreSnippetArrayNested(),
            'root' => $this->Helpers->toolSnippetRoot(),
        ];
        return $args;
    }

    protected function response($args) {
        $basepath = kirby()->roots()->plugins() . DS . 'kirby-component-kit';
        $path = $basepath . DS . 'tool' . DS . 'templates' . DS . 'home.php';

        return new Response(tpl::load($path, ['data' => $args]), 'html', 200);
    }
}