<?php
namespace JensTornell\ComponentKit;
use response;
use tpl;

class Html extends View {
    public function run($id) {
        $args = $this->args($id);

        $args['data']['current']['title'] = $id . ' - HTML - Component Kit';
        $args['data']['current']['dir'] = pathinfo($args['data']['current']['path'])['dirname'];
        $args['data']['current']['view'] = 'html';
        $args['data']['current']['urls'] = $this->urls([
            'id' => $id,
            'items' => [
                'preview' => 'Preview',
                'php' => 'PHP',
                'html' => 'HTML',
            ]
        ]);
        $args['data']['current']['pattern'] = $args['data']['current']['dir'] . '/*';
        $args['data']['current']['files'] = $this->files($args);

        return $this->response('templates' . DS . 'home' . DS . 'component.php', $args);
    }

    protected function files($args) {
        extract($args['data']['current']);
        $glob = glob($pattern, GLOB_BRACE);
        $glob = array_filter($glob, 'is_file');

        foreach($glob as $file) {
            $current_filename = basename($file);
            $files[] = [
                'active' => ($view == 'file' && $filename == $current_filename) ? ' class="active"' : '',
                'url' => u('component-kit/file/' . $id . '?file=' . $current_filename),
                'filename' => $current_filename,
            ];
        }
        return $files;
    }
}