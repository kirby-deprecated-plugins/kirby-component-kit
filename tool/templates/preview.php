<?php
namespace JensTornell\ComponentKit;
extract($data);

if(isset($name)) {
    $Preview = new Preview(kirby());
    $path =  settings::components() . DS . str_replace('/', DS, $name);

    if(file_exists($path . DS . 'snippet.php')) {
        $path = $path . DS . 'snippet.php';
    } elseif(file_exists($path . DS . 'template.php')) {
        $path = $path . DS . 'template.php';
    }

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