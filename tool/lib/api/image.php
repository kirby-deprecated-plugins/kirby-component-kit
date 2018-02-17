<?php
namespace JensTornell\ComponentKit;

class ImageAPI {
    public function set($globals, $file) {
        $result = (object)[
            'image' => (object)[
                'url' => $this->url($globals->tool->urls->home, $file->component->id, $file->file->name, $file->file->group),
                'dimensions' => $this->dimensions($file->file->path),
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