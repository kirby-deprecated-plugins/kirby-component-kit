<?php
namespace JensTornell\ComponentKit;

class RouteToolMissing extends RouteDefault {
    public function set($args) {
        $base = $this->base($args['uid'], $args['view']);

        $title = [
            'title' => $base['current']->id . ' - Component Kit',
        ];

        $results = (object)array_merge(
            $title,
            (array)$base
        );

        return $this->response([
            'path' => $results->current->templatepath,
        ], $results);
    }
}