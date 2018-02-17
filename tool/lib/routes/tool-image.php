<?php
namespace JensTornell\ComponentKit;

class RouteToolImage {
    public function set($template, $view, $uid) {
        $Globals = new Globals();
        $Core = new CoreAPI();
        $File = new FileAPI();
        $Files = new FilesAPI();
        $Finder = new Finder();
        $Image = new ImageAPI();
        $Bar = new BarAPI();

        $globals = $Globals->set();
        print_r($globals);
        $Core->register($globals->tool->roots->components);
        $Core->register($globals->core->roots->components);

        $files = $Files->set($globals->core->roots->components, $Finder);

        print_r($files);

        $file = $File->set('tool', 'image', $uid, $globals);
        $image = $Image->set($globals, $file);

        $bar = $Bar->set($file);

        print_r($bar);

        $results = (object)array_merge(
            (array)$file,
            (array)$image,
            (array)$bar
        );
        
        print_r($results);
    }
}