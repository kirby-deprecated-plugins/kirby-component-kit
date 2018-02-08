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
        $Helpers = new Helpers();
        $current = $Helpers->currrent($uid, $Helpers->coreSnippetArray());

        $this->setExtension();
        $this->setFilepath($current);
        $this->setCtype();

        if(!$this->allowed()) return site()->visit(site()->errorPage());

        $image = file_get_contents($this->filepath);

        header('Content-type: ' . $this->ctype);
        return new Response($image, $this->ctype, 200);
    }

    protected function setExtension() {
        $this->extension = pathinfo(get('file'))['extension'];
    }

    protected function response($args) {
        $basepath = kirby()->roots()->plugins() . DS . 'kirby-component-kit';
        $path = $basepath . DS . 'tool' . DS . 'templates' . DS . 'home.php';

        return new Response(tpl::load($path, ['data' => $args]), 'html', 200);
    }

    protected function setFilepath($current) {
        $this->filepath = pathinfo($current['path'])['dirname'] . DS . get('file');
    }

    protected function allowed() {
        if(in_array($this->extension, $this->whitelist) && file_exists($this->filepath))
            return true;
    }

    protected function setCtype() {
        switch($this->extension) {
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
        $this->ctype = $ctype;
    }
}