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

        print_r($flat);

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

    /*protected function bar($args) {        
        $root = u(settings::path() . '/');
        $urls = [
            'preview' => [ 'title' => 'Preview',
            ],
            'code' => [
                'title' => 'PHP',
            ],
            'html' => [
                'title' => 'HTML',
            ]
        ];

        
        $array = [];
        foreach($urls as $key => $url) {
            $array[$key] = $url;
            $array[$key]['url'] = $root . 'tool/' . $key . '/' . $args['data']['current']['id'] . '/component.php';

            if($args['data']['current']['route_type'] == $key) {    
                $array[$key]['active'] = true;
            }
        }
        return $array;
    }*/

    /*protected function toolSnippetArray() {
        return $this->Finder->paths($this->tool_components_root, 'ckit/');
    }

    protected function coreComponentsFlat() {
        return $this->Finder->paths(settings::directory());
    }

    protected function coreComponentsArray() {
        return $this->dataToNested($this->coreComponentsFlat());
    }*/

    // NOT USED
    /*protected function fileWhitelists() {
        $whitelists = [
            'code' => [
                'css', 'js', 'scss', 'sass', 'less', 'php', 'yaml', 'yml'
            ],
            'image' => [
                'jpg', 'jpeg', 'png', 'gif'
            ]
        ];
        return $whitelists;
    }*/

    /*protected function currrent($name, $flat) {
        foreach($flat as $item) {
            if($item['id'] == $name) {
                return $item;
            }
        }
    }*/

    // I FILES CLASS
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
                'type' => ($item['count'] == 0) ? 'empty' : $item['type'],
                'id' => $item['id'],
                'raw' => $item['raw'],
                'count' => $item['count'],
                'first' => (isset($item['first'])) ? $item['first'] : null,
                'aside_url' => $this->asideUrl($item),
            ];

            $result = array_merge_recursive($result, $temp);
        }
        return $result;
    }

    /*protected function response($path, $args) {
        $basepath = kirby()->roots()->plugins() . DS . 'kirby-component-kit';
        $path = $basepath . DS . 'tool' . DS . 'components' . DS . $path;

        $Render = new Render(kirby());
        $html = $Render->snippet($path, $args);

        return new Response(trim($html), 'html', 200);
    }*/

    protected function asideUrl($item) {
        if(isset($item['first'])) {
            $type = ($item['first'] == 'component.php') ? 'preview' : 'code';
            return u(settings::path() . '/tool/' . $type . '/' . $item['id'] . '/' . $item['first']);
        }
    }
}