<?php
namespace JensTornell\ComponentKit;

class Helpers {
    public function __construct() {
        $this->Snippet = new Snippet();
        $this->Finder = new Finder();
    }
    public function dataToNested($data) {
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

    public function toolSnippetRoot() {
        return realpath(__DIR__ . DS . '..' . DS . 'components');
    }

    public function coreSnippetArray() {
        return $this->Finder->paths($this->Finder->root());
    }

    public function coreSnippetArrayNested() {
        return $this->dataToNested($this->coreSnippetArray());
    }

    public function toolSnippetArray() {
        return $this->Finder->paths($this->toolSnippetRoot(), 'ckit/');
    }

    public function toolComponentsRegister() {
        return $this->Snippet->register($this->toolSnippetArray());
    }

    public function fileWhitelists() {
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

    // Returns code or image dending on the type
    public function fileGroupType($filename) {
        $extension = pathinfo($filename)['extension'];
        foreach($this->fileWhitelists() as $grouptype => $collections) {
            $whitelists_code = $this->fileWhitelists()['code'];
            if(in_array($extension, $collections)) {
                return $grouptype;
            }
        }
    }

    public function currrent($name, $flat) {
        foreach($flat as $item) {
            if($item['name'] == $name) {
                return $item;
            }
        }
    }
}