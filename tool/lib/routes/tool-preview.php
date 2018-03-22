<?php
namespace JensTornell\ComponentKit;
use yaml;

class RouteToolPreview extends RouteDefault {
    public function set($args) {
        $base = $this->base($args['uid'], $args['view']);

        if($args['method'] == 'POST') {
            $data = yaml::encode(json_decode($_POST['data'], true));
            file_put_contents($base['current']->component_root . DS . 'config.yml', $data);
        }

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