<?php
namespace JensTornell\ComponentKit;

class RouteToolHome extends RouteDefault {
    public function set($args) {
        $this->Finder = new Finder();
        $this->Globals = new GlobalsAPI();
        $this->globals = $this->Globals->set();
        $this->register($this->globals);

        $this->components = $this->Components->set($this->globals->roots->components, $this->Finder);

        $results = (object)[
            'globals' => $this->globals,
            'components' => $this->components->nested
        ];

        return $this->response([
            'path' => $this->globals->roots->template_tool,
        ], $results);
    }
}