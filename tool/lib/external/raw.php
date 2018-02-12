<?php
namespace JensTornell\ComponentKit;
use response;
use tpl;

class ExternalRaw extends View {
    public function run($uid) {
        $args = $this->args($uid);

        return $this->response($args);
    }

    protected function response($args) {
        /*$basepath = kirby()->roots()->plugins() . DS . 'kirby-component-kit';
        $path = $basepath . DS . 'tool' . DS . 'templates' . DS . 'raw.php';

        return new Response(tpl::load($path, ['data' => $args]), 'html', 200);*/

        $basepath = kirby()->roots()->plugins() . DS . 'kirby-component-kit';
        $path = $basepath . DS . 'tool' . DS . 'components' . DS . 'templates' . DS . 'raw' . DS . 'component.php';

        $Render = new Render(kirby());
        $html = $Render->snippet($path, $args);

        return new Response(trim($html), 'html', 200);
    }
}