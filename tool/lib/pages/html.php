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

        return $this->response($args);
    }

    protected function response($args) {
        $basepath = kirby()->roots()->plugins() . DS . 'kirby-component-kit';
        $path = $basepath . DS . 'tool' . DS . 'components' . DS . 'templates' . DS . 'home' . DS . 'component.php';

        $Render = new Render(kirby());
        $html = $Render->snippet($path, $args);

        return new Response(trim($html), 'html', 200);
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