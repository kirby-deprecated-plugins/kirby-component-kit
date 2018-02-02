<?php
extract($data);

if(isset($name)) {
    $SnippetPreview = new JensTornell\ComponentKit\SnippetPreview(kirby());
    $snippet_path =  kirby()->roots()->component_kit_snippets() . DS . str_replace('/', DS, $name);
    $snippet_path = (file_exists($snippet_path . '.php')) ? $snippet_path . '.php' : $snippet_path . DS . 'snippet.php';

    $html = $SnippetPreview->render(
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