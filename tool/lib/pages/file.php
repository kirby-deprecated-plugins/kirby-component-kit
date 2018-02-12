<?php
namespace JensTornell\ComponentKit;
use response;
use tpl;

class File extends View {
    public function run($uid) {
        $args = $this->args($uid);

        $file = get('file');

        $args['title'] = $this->title($uid);
        $args['filename'] = $file;
        $args['file_group'] = $this->Helpers->fileGroupType($file);

        return $this->response($args);
    }

    protected function title($uid) {
        return get('file') . ' - ' . $uid . ' - Component Kit';
    }

    protected function response($args) {
        $basepath = kirby()->roots()->plugins() . DS . 'kirby-component-kit';
        $path = $basepath . DS . 'tool' . DS . 'templates' . DS . 'home.php';

        return new Response(tpl::load($path, ['data' => $args]), 'html', 200);
    }
}

/*
$code = ['php'];
                                $markup = ['css', 'yml', 'scss', 'less'];
                                $image = ['jpg', 'jpeg', 'png', 'gif'];
                                $text = ['txt']
*/