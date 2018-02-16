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

    public function run($uid) {
        $this->filename = basename($uid);
        $this->dirname = dirname($uid);
        
        $args = $this->args($this->dirname);

        $args['data']['current']['title'] = $this->filename . ' - ' . $this->dirname . ' - Component Kit';
        $args['data']['current']['filename'] = $this->filename;
        $args['data']['current']['extension'] = pathinfo($this->filename)['extension'];
        $args['data']['current']['filepath'] = $args['data']['current']['path'] . DS . $args['data']['current']['filename'];
        $args['data']['current']['ctype'] = $this->setCtype($args['data']['current']['extension']);


        if(!$this->allowed($args['data']['current'])) return site()->visit(site()->errorPage());

        $image = file_get_contents($args['data']['current']['filepath']);
        
        return new Response($image, $args['data']['current']['ctype'], 200);
    }

    protected function setFilepath($current) {
        $this->filepath = pathinfo($current['path'])['dirname'] . DS . get('file');
    }

    protected function allowed($current) {
        extract($current);
        if(in_array($extension, $this->whitelist) && file_exists($filepath))
            return true;
    }

    /*protected function setCtype($extension) {
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
    }*/
}