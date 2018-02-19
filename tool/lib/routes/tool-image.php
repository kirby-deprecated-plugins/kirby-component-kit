<?php
namespace JensTornell\ComponentKit;

class RouteToolImage extends RouteDefault {
    public function set($args) {
        $base = $this->base($args['uid'], $args['view']);

        $image = $this->Image->set($this->globals, $this->file);

        $results = (object)array_merge(
            (array)$image,
            (array)$base
        );

        return $this->response([
            'path' => $results->current->templatepath,
        ], $results);
    }
}