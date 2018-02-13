<?php
namespace JensTornell\ComponentKit;
use response;
use tpl;

class File extends View {
    public function run($id) {
        $args = $this->args($id);

        $self = $args['data']['current'];
        $dir = pathinfo($self['path'])['dirname'];
        $extension = pathinfo(get('file'))['extension'];

        $current = [
            'title' => $this->title($id),
            'dir' => $dir,
            'filename' => get('file'),
            'view' => 'file',
            'extension' => $extension,
            'group' => $this->group($extension),
            'filetype' => $this->filetype($extension),
            'path' => $dir . DS . get('file'),
            'pattern' => $dir . '/*',
        ];
        $current = array_merge($args['data']['current'], $current);
        $current['files'] = $this->files($current);

        if($current['group'] == 'image') {
            $current['url'] = u($args['data']['route'] . '/image/' . $current['id'] . '?file=' . get('file'));
        }

        $args['data']['current'] = $current;

        return $this->response($args);
    }

    protected function title($id) {
        return get('file') . ' - ' . $id . ' - Component Kit';
    }

    protected function response($args) {
        $basepath = kirby()->roots()->plugins() . DS . 'kirby-component-kit';
        $path = $basepath . DS . 'tool' . DS . 'components' . DS . 'templates' . DS . 'home' . DS . 'component.php';

        $Render = new Render(kirby());
        $html = $Render->snippet($path, $args);

        return new Response(trim($html), 'html', 200);
    }

    protected function filetype($language) {
        switch($language) {
            case 'yml':
                $language = 'yaml';
                break;
            case 'scss':
                $language = 'sass';
                break;
        }
        return $language;
    }

    protected function files($current) {
        $glob = glob($current['pattern'], GLOB_BRACE);
        $glob = array_filter($glob, 'is_file');

        foreach($glob as $file) {
            $current_filename = basename($file);
            $files[] = [
                'active' => ($current['view'] == 'file' && $current['filename'] == $current_filename) ? ' class="active"' : '',
                'url' => u('component-kit/file/' . $current['id'] . '?file=' . $current_filename), // FEL ROUTE
                'filename' => $current_filename,
            ];
        }
        return $files;
    }

    protected function whitelists() {
        $whitelists = [
            'code' => [
                'css', 'js', 'scss', 'sass', 'less', 'php', 'yaml', 'yml'
            ],
            'image' => [
                'jpg', 'jpeg', 'png', 'gif'
            ]
        ];
        return $whitelists;
    }

    protected function group($extension) {
        foreach($this->whitelists() as $group => $collections) {
            if(in_array($extension, $collections)) {
                return $group;
            }
        }
    }
}