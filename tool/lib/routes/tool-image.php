<?php
namespace JensTornell\ComponentKit;

class RouteToolImage extends RouteDefault {
    public function set($args) {
        $base = $this->base($args['uid']);

        $image = $this->Image->set($this->globals, $this->file);
        $bar = $this->Bar->set([
            'view' => $args['view'],
            'id' => $this->file->component->id
        ]);

        $results = (object)array_merge(
            (array)$base,
            (array)$image,
            (array)$bar
        );

        #print_r($base);

        return $this->response([
            'path' => $base->roots->template,
        ], $results);
        
        #print_r($results);
    }
}