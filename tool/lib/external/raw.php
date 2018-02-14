<?php
namespace JensTornell\ComponentKit;
use response;
use tpl;

class ExternalRaw extends View {
    public function run($id) {
        $args = $this->args($id);

        return $this->response('--raw' . DS . 'component.php', $args);
    }
}