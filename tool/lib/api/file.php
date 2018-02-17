<?php
namespace JensTornell\ComponentKit;

class FileAPI {
    public function set($template, $view, $uid, $globals, $flat) {
        $filename = basename($uid);
        $current = $this->current(dirname($uid), $flat);
        $filepath = $current['path'] . DS . $filename;
        $extension = pathinfo($filename)['extension'];
        $group = $this->group($extension);
        $filesize = $this->filesize($filepath);

        $result = (object)[
            'component' => (object)[
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
                'filesize' => $filesize,
                'size' => $this->humanFilesize($filesize),
                'extension' => $extension,
                'count' => $current['count'],
                'group' => $group,
                'type' => $this->filetype($extension),
            ],
        ];
        return $result;
    }

    private function filesize($filepath) {
        if(!file_exists($filepath)) return;

        return filesize($filepath);
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