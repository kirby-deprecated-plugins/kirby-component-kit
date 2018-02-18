<?php
namespace JensTornell\ComponentKit;

class ImageAPI {
    public function set($globals, $file) {
        $result = (object)[
            'image' => (object)[
                'url' => $this->url($globals->urls->home, $file->current->id, $file->current->filename, $file->current->filegroup),
                'dimensions' => $this->dimensions($file->current->filepath),
            ]
        ];
        return $result;
    }

    private function url($home, $id, $filename, $group) {
        if($group == 'image') {
            return $home . '/render/image/' . $id . '/' . $filename;
        }
        return null;
    }

    private function dimensions($path) {
        if(!file_exists($path)) return;
        
        $dimensions = getimagesize($path);
        return $dimensions[0] . ' x ' . $dimensions[1];
    }
}