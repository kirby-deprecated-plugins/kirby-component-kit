<?php
namespace JensTornell\ComponentKit;
use response;
use tpl;

class Preview extends View {
    public function run($id) {
        $args = $this->args($id);

        $args['data']['current']['title'] = $id . ' - Component Kit';
        $args['data']['current']['view'] = 'preview';
        $args['data']['current']['urls'] = $this->urls([
            'id' => $id,
            'items' => [
                'preview' => 'Preview',
                'php' => 'PHP',
                'html' => 'HTML',
            ]
        ]);
        $args['data']['current']['pattern'] = $args['data']['current']['path'] . '/*';
        $args['data']['current']['files'] = $this->files($args);

        return $this->response('templates' . DS . 'home' . DS . 'component.php', $args);
    }

    protected function files($args) {
        $current = $args['data']['current'];
        $glob = glob($current['pattern'], GLOB_BRACE);
        $glob = array_filter($glob, 'is_file');

        foreach($glob as $file) {
            $current_filename = basename($file);
            $files[] = [
                'active' => ($current['view'] == 'file' && $current['filename'] == $current_filename) ? ' class="active"' : '',
                'url' => u('component-kit/file/' . $current['id'] . '?file=' . $current_filename),
                'filename' => $current_filename,
            ];
        }
        return $files;
    }
}