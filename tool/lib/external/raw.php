<?php
namespace JensTornell\ComponentKit;
use response;
use tpl;

class ExternalRaw extends View {
    public function run($uid) {
        $args = $this->args($uid);

        $this->template_path = $this->templatePath();

        $Render = new Render(kirby());
        $html = $Render->snippet($this->template_path, $args);

        return new Response(trim($html), 'html', 200);
    }

    protected function templatePath() {
        $path = kirby()->roots()->plugins() . '/kirby-component-kit/tool/components/--raw/component.php';
        $path = str_replace('/', DS, $path);
        return $path;
    }
}