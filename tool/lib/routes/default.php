<?php
namespace JensTornell\ComponentKit;
use response;

class RouteDefault {
    public function __construct() {
        $this->Globals = new Globals();
        $this->Core = new CoreAPI();
        $this->File = new FileAPI();
        $this->Files = new FilesAPI();
        $this->Finder = new Finder();
        $this->Image = new ImageAPI();
        $this->Bar = new BarAPI();
    }

    protected function base($uid) {
        $this->globals = $this->Globals->set();

        $this->register($this->globals);

        $this->files = $this->Files->set($this->globals->roots->components, $this->Finder);
        $this->file = $this->File->set('tool', 'image', $uid, $this->globals, $this->files->flat);

        unset($this->files->flat);

        return (object)array_merge(
            (array)$this->globals,
            (array)$this->file,
            (array)$this->files
        );
    }

    protected function register($globals) {
        $this->Core->register($globals->roots->tool_components);
        $this->Core->register($globals->roots->components);
    }

    protected function response($args, $results) {
        $Render = new Render(kirby());

        $html = $Render->snippet($args['path'], ['data' => $results]);

        return new Response(trim($html), 'html', 200);
    }
}