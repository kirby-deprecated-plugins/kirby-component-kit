<?php
namespace JensTornell\ComponentKit;
use response;

class View {
    public function __construct() {
        $this->Snippet = new Snippet();
        $this->Finder = new finder();
        $this->tool_components_root = realpath(__DIR__ . DS . '..' . DS . 'components');

        $this->Snippet->register($this->tool_components_root, 'ckit/');
    }

    protected function args($id) {
        $flat = $this->coreComponentsFlat();
        $args = [
            'data' => [
                'route' => settings::path(),
                'root' => $this->tool_components_root,
                'home' => u(settings::path()),
                'current' => $this->currrent($id, $flat),
            ],
            'paths' => $this->coreComponentsArray(),
            'flat' => $flat,
        ];
        $args['data']['current']['id'] = $id;

        return $args;
    }

    protected function urls($args) {
        $root = u(settings::path() . '/');
        $urls = [
            'preview' => [
                'title' => 'Preview',
                'url' => $root . 'preview/' . $args['id'],
            ],
            'php' => [
                'title' => 'PHP',
                'url' => $root . 'file/' . $args['id'] . '?file=component.php',
            ],
            'html' => [
                'title' => 'HTML',
                'url' => $root . 'html/' . $args['id'],
            ]
        ];
        return $urls;
    }

    protected function toolSnippetArray() {
        return $this->Finder->paths($this->tool_components_root, 'ckit/');
    }

    protected function coreComponentsFlat() {
        return $this->Finder->paths(settings::directory());
    }

    protected function coreComponentsArray() {
        return $this->dataToNested($this->coreComponentsFlat());
    }

    protected function fileWhitelists() {
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

    protected function currrent($name, $flat) {
        foreach($flat as $item) {
            if($item['id'] == $name) {
                return $item;
            }
        }
    }

    protected function dataToNested($data) {
        $result = [];
    
        foreach($data as $item) {
            $path = explode('/', $item['id']);
            $temp = [];
            $p = &$temp;

            $last = array_pop($path);
    
            foreach($path as $s) {
                $p = &$p[$s]['_children'];
            }
    
            $filename = basename($item['path']);
            $dir = pathinfo($item['path'])['dirname'];
            $p[$last] = [
                'path' => $dir,
                'type' => $item['type'],
                'id' => $item['id'],
                'raw' => $item['raw'],
            ];

            $result = array_merge_recursive($result, $temp);
        }
        return $result;
    }

    protected function response($path, $args) {
        $basepath = kirby()->roots()->plugins() . DS . 'kirby-component-kit';
        $path = $basepath . DS . 'tool' . DS . 'components' . DS . $path;

        $Render = new Render(kirby());
        $html = $Render->snippet($path, $args);

        return new Response(trim($html), 'html', 200);
    }
}