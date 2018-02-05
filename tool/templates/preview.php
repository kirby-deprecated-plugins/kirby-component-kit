<?php
extract($data);

if(isset($name)) {
    $Preview = new JensTornell\ComponentKit\Preview(kirby());
    $snippet_path =  kirby()->roots()->components() . DS . str_replace('/', DS, $name);
    $snippet_path = (file_exists($snippet_path . '.php')) ? $snippet_path . '.php' : $snippet_path . DS . 'snippet.php';

    $html = $Preview->snippet(
        $snippet_path,
        [
            'page' => page('about') // Valfritt
        ],
        null
    );
    snippet('ckit/preview/header', ['data' => $data]);
    echo $html;
    snippet('ckit/preview/footer', ['data' => $data]);
}