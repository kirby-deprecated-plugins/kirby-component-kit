<?php
namespace JensTornell\ComponentKit;

class FileAPI {
    public function __construct() {
        $this->Files = new FilesAPI();
        $this->Globals = new Globals();
    }

    public function set($template, $view, $uid) {
        $this->files = $this->Files->set();
        $this->globals = $this->Globals->set();

        $filename = basename($uid);
        $current = $this->current(dirname($uid), $this->files->flat);
        $filepath = $current['path'] . DS . $filename;
        $extension = pathinfo($filename)['extension'];
        $group = $this->group($extension);

        $result = (object)[
            'component' => [
                'id' => $current['id'],
                'raw' => $current['raw'],
                'view' => $view,
                'template' => $template,
                'type' => $current['type'],
                'ctype' => $this->ctype($extension),
            ],
            'roots' => (object)[
                'component' => $current['path'],
            ],
            'file' => (object)[
                'path' => $filepath,
                'name' => $filename,
                'first' => $current['first'],
                'size' => $this->humanFilesize(filesize($filepath)),
                'extension' => $extension,
                'count' => $current['count'],
                'group' => $group,
                'type' => $this->filetype($extension),
                'image_url' => $this->url($current['id'], $filename, $group),
            ],
        ];
        $result->component = array_filter($result->file);
        return $result;
    }

    private function url($id, $filename, $group) {
        print_r($this->globals);
        if($group == 'image') {
            return $this->globals->tool->urls->home . '/render/image/' . $id . '/' . $filename;
        }
        return null;
    }

    private function humanFilesize($bytes) {
        if($bytes == 0) {
            return "0 byte";
        }
    
        $s = array('byte', 'kB', 'MB', 'GB', 'TB', 'PB');
        $e = floor(log($bytes, 1024));
    
        return round($bytes/pow(1024, $e), 2). ' ' . $s[$e];
    }

    protected function current($name, $flat) {
        foreach($flat as $item) {
            if($item['id'] == $name) {
                return $item;
            }
        }
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

    protected function ctype($extension) {
        switch($extension) {
            case 'gif':
                $ctype = 'image/gif';
                break;
            case 'png':
                $ctype = 'image/png';
                break;
            case 'jpeg':
            case 'jpg':
                $ctype = 'image/jpeg';
                break;
            default:
                $ctype = 'text/html';
        }
        return $ctype;
    }
}