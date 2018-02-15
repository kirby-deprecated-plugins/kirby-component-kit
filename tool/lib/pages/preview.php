<?php
namespace JensTornell\ComponentKit;
use response;
use tpl;

class Preview extends Filex {
    public function run($uid) {
        $this->filename = basename($uid);
        $this->dirname = dirname($uid);

        $args = $this->args($this->dirname);

        $args['data']['current']['title'] = $this->dirname . ' - Component Kit';
        $args['data']['current']['filename'] = $this->filename;
        $args['data']['current']['view'] = 'preview';
        $args['data']['current']['pattern'] = $args['data']['current']['path'] . '/*';        
        $args['data']['current']['route_type'] = 'preview';
        $args['data']['current']['preview_url'] = u(settings::path() . '/render/raw/' . $this->dirname);

        $args['data']['current']['files'] = $this->files($args['data']['current']);
        $args['data']['current']['bar'] = $this->bar($args);

        return $this->response('templates' . DS . 'home' . DS . 'component.php', $args);
    }
}