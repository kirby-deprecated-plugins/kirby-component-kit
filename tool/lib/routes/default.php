<?php
namespace JensTornell\ComponentKit;

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

        $this->files = $this->Files->set($this->globals->core->roots->components, $this->Finder);
        $this->file = $this->File->set('tool', 'image', $uid, $this->globals, $this->files->flat);

        return (object)array_merge(
            (array)$this->file,
            (array)$this->files
        );
    }

    protected function register($globals) {
        $this->Core->register($globals->tool->roots->components);
        $this->Core->register($globals->core->roots->components);
    }
}