<?php
namespace JensTornell\ComponentKit;
use response;

class RouteRenderImage extends RouteDefault {
    protected $whitelist = [
        'gif',
        'png',
        'jpeg',
        'jpg'
    ];

    public function set($args) {
        $data = (object)$this->base($args['uid'], $args['view']);
        $extension = $data->current->extension;
        $filepath = $data->current->filepath;

        if(!$this->allowed($extension, $filepath)) {
            return site()->visit(site()->errorPage());
        }

        $image = file_get_contents($data->current->filepath);
        
        return new Response($image, $data->current->content_type, 200);
    }

    protected function allowed($extension, $filepath) {
        if(in_array($extension, $this->whitelist) && file_exists($filepath))
            return true;
    }
}