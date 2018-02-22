<?php
namespace JensTornell\ComponentKit;
use response;

class RouteDefault {
    public function __construct() {
        $this->Globals = new GlobalsAPI();
        $this->Core = new CoreAPI();
        $this->File = new FileAPI();
        $this->Components = new ComponentsAPI();
        $this->Finder = new Finder();
        $this->Image = new ImageAPI();
        $this->Bar = new BarAPI();
        $this->Files = new FilesAPI();
    }

    protected function base($uid, $view) {
        $this->globals = $this->Globals->set();

        $this->register($this->globals);

        $this->components = $this->Components->set($this->globals->roots->components, $this->Finder);
        $this->file = $this->File->set('tool', $view, $uid, $this->globals, $this->components->flat);
        $this->files = $this->Files->set((object)[
            'globals' => $this->globals,
            'home_url' => $this->globals->urls->home,
            'current' => $this->file
        ]);

        unset($this->components->flat);

        return [
            'globals' => $this->globals,
            'current' => $this->file,
            'files' => $this->files,
            'components' => $this->components->nested
        ];
    }

    protected function register($globals) {
        $prefix = 'ckit/';

        $this->Snippet = new Snippet();
        $this->Snippet->register($globals->roots->tool_components, $prefix);
        $this->Snippet->register($globals->roots->components, '', true);
    }

    protected function response($args, $results) {
        $Render = new Render(kirby());

        $html = $Render->snippet($args['path'], ['data' => $results]);

        return new Response(trim($html), 'html', 200);
    }
}