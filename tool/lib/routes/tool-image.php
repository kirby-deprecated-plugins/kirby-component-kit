<?php
namespace JensTornell\ComponentKit;

class RouteToolImage extends RouteDefault {
    public function set($args) {
        $base = $this->base($args['uid'], $args['view']);

        $image = $this->Image->set($this->globals, $this->file);

        $title = [
            'title' => $base['current']->id . '/' . $base['current']->filename . ' - Component Kit',
        ];

        $results = (object)array_merge(
            $title,
            (array)$image,
            (array)$base
        );

        return $this->response([
            'path' => $results->current->templatepath,
        ], $results);
    }
}