<?php
namespace JensTornell\ComponentKit;
use str;

extract($data);
#print_r($data);

if(isset($name)) {
    $Preview = new Preview(kirby());

    $item = itemFinder($name, $data);
    #print_r($item);

    $path = $item['path'];

    /*$template_path = settings::components() . DS . '--' . $name . DS . 'template.php';
    $snippet_path = settings::components() . DS . str_replace('/', DS, $name) . DS . 'snippet.php';

    echo $snippet_path;

    // Is template
    if(!str::contains($name, '/') && file_exists($template_path)) {
        $path = $template_path;
    } elseif(file_exists($snippet_path)) {
        $path = $snippet_path;
    }*/

    $html = $Preview->snippet(
        $path,
        [
            'page' => page('about') // Valfritt
        ],
        null
    );
    snippet('ckit/preview/header', ['data' => $data]);
    echo $html;
    snippet('ckit/preview/footer', ['data' => $data]);
}

function itemFinder($name, $data) {
    foreach($data['flat'] as $item) {
        if($item['name'] == $name) {
            return $item;
        }
    }
}