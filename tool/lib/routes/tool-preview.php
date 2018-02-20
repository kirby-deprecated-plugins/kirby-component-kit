<?php
namespace JensTornell\ComponentKit;

class RouteToolPreview extends RouteDefault {
    public function set($args) {
        $base = $this->base($args['uid'], $args['view']);
        $bar = $this->Bar->set([
            'view' => $args['view'],
            'id' => $this->file->id
        ]);

        $title = [
            'title' => $base['current']->id . ' - Preview - Component Kit',
        ];

        $results = (object)array_merge(
            $title,
            (array)$bar,
            (array)$base
        );

        return $this->response([
            'path' => $results->current->templatepath,
        ], $results);
    }
}