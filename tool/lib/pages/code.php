<?php
namespace JensTornell\ComponentKit;
use response;
use tpl;

class Code extends Filex {
    public function run($uid) {
        $this->filename = basename($uid);
        $this->dirname = dirname($uid);

        $args = $this->args($this->dirname);

        $self = $args['data']['current'];
        $extension = pathinfo($this->filename)['extension'];

        $current = [
            'title' => $this->filename . ' - ' . $this->dirname . ' - Component Kit',
            'filename' => $this->filename,
            'view' => 'file',
            'extension' => $extension,
            'group' => $this->group($extension),
            'filetype' => $this->filetype($extension),
            'filepath' => $args['data']['current']['path'] . DS . $this->filename,
            'pattern' => $args['data']['current']['path'] . '/*',
            'route_type' => 'code'
        ];

        $current = array_merge($args['data']['current'], $current);
        $current['files'] = $this->files($current);

        if($current['group'] == 'image') {
            $current['url'] = u($args['data']['route'] . '/render/image/' . $current['id'] . '/' . $this->filename);
        }

        $args['data']['current'] = $current;
        $args['data']['current']['bar'] = $this->bar($args);
        $args['data']['current']['info']['filesize'] = $this->filesize(filesize($args['data']['current']['filepath']));

        return $this->response('templates' . DS . 'home' . DS . 'component.php', $args);
    }
}