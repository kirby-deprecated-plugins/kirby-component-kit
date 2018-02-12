<?php
namespace JensTornell\ComponentKit;

class View {
    public function __construct() {
        $this->Helpers = new Helpers();

        $this->Snippet = new Snippet();
        $this->Finder = new finder();
        $this->tool_components_root = realpath(__DIR__ . DS . '..' . DS . 'components');

        $this->Snippet->register($this->tool_components_root, 'ckit/');
    }

    protected function args($id) {
        $flat = $this->coreComponentsFlat();
        $args = [
            'data' => [
                'route' => settings::route(),
                'current' => $this->currrent($id, $flat),
                'name' => $id,
                'root' => $this->tool_components_root,
                'home' => u(settings::route())
            ],
            'paths' => $this->coreComponentsArray(),
            'flat' => $flat,
        ];
        return $args;
    }

    protected function url($id, $view) {
        return u(settings::route() . '/' . $view . '/' . $id);
    }

    protected function toolSnippetArray() {
        return $this->Finder->paths($this->tool_components_root, 'ckit/');
    }

    protected function coreComponentsFlat() {
        return $this->Finder->paths(settings::components());
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
            if($item['name'] == $name) {
                return $item;
            }
        }
    }

    protected function dataToNested($data) {
        $result = [];
    
        foreach($data as $item) {
            $path = explode('/', $item['name']);
            $temp = [];
            $p = &$temp;

            $last = array_pop($path);
    
            foreach($path as $s) {
                $p[$s] = ['_children' => []];
                $p = &$p[$s]['_children'];
            }
    
            $filename = basename($item['path']);
    
            if($filename == 'component.php') {
    
                $p[$last] = [
                    'path' => $item['path'],
                    'type' => $item['type'],
                    'id' => $item['name'],
                    'raw' => $item['raw'],
                    'filename' => $item['filename'],
                ];
                $result = array_merge_recursive($result, $temp);
            }
        }
        return $result;
    }
}