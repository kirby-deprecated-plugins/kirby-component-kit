<?php
namespace JensTornell\ComponentKit;

class RouteToolImage extends RouteDefault {
    public function set($template, $view, $uid) {
        $base = $this->base($uid);

        $image = $this->Image->set($this->globals, $this->file);
        $bar = $this->Bar->set($view, $this->file->component->id);

        $results = (object)array_merge(
            (array)$base,
            (array)$image,
            (array)$bar
        );
        
        print_r($results);
    }
}