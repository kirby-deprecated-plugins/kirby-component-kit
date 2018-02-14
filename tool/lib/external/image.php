<?php
namespace JensTornell\ComponentKit;
use response;
use tpl;

class ExternalImage extends View {
    protected $extension;
    protected $ctype;
    protected $filepath;
    protected $whitelist = [
        'gif',
        'png',
        'jpeg',
        'jpg'
    ];

    public function run($id) {
        $args = $this->args($id);

        $args['data']['current']['title'] = $this->title($id);
        $args['data']['current']['dir'] = pathinfo($args['data']['current']['path'])['dirname'];
        $args['data']['current']['filename'] = get('file');
        $args['data']['current']['extension'] = pathinfo($args['data']['current']['filename'])['extension'];
        $args['data']['current']['path'] = $args['data']['current']['dir'] . DS . $args['data']['current']['filename'];
        $args['data']['current']['ctype'] = $this->setCtype($args['data']['current']['extension']);

        if(!$this->allowed($args['data']['current'])) return site()->visit(site()->errorPage());

        $image = file_get_contents($args['data']['current']['path']);

        return new Response($image, $args['data']['current']['ctype'], 200);
    }

    protected function title($id) {
        return get('file') . ' - ' . $id . ' - Component Kit';
    }

    protected function setFilepath($current) {
        $this->filepath = pathinfo($current['path'])['dirname'] . DS . get('file');
    }

    protected function allowed($current) {
        extract($current);
        if(in_array($extension, $this->whitelist) && file_exists($path))
            return true;
    }

    protected function setCtype($extension) {
        switch($extension) {
            case "gif":
                $ctype = "image/gif";
                break;
            case "png":
                $ctype = "image/png";
                break;
            case "jpeg":
            case "jpg":
                $ctype = "image/jpeg";
                break;
            default:
        }
        return $ctype;
    }
}