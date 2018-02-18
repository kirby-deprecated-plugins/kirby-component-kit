<?php
namespace JensTornell\ComponentKit;

class RouteToolImage extends RouteDefault {
    public function set($args) {
        $base = $this->base($args['uid']);

        $image = $this->Image->set($this->globals, $this->file);
        $bar = $this->Bar->set([
            'view' => $args['view'],
            'id' => $this->file->current->id
        ]);

        $results = (object)array_merge(
            (array)$image,
            (array)$bar,
            (array)$base
        );

        print_r($results);

        return $this->response([
            'path' => $base->current->templatepath,
        ], $results);
    }
}