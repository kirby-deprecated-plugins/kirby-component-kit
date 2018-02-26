<?php
namespace JensTornell\ComponentKit;
use response;

class RouteRenderRaw extends RouteDefault {
    public function set($args) {
        $data = (object)$this->base($args['uid'], $args['view']);

        #print_r($data);
 
        $Render = new Render(kirby());
        $html = $Render->snippet($data->globals->roots->template_raw, ['data' => $data]);

        return new Response(trim($html), 'html', 200);
    }
}