<?php
namespace JensTornell\ComponentKit;
use response;
use tpl;

class Filex extends View {
    protected function files($current) {
        $glob = glob($current['pattern'], GLOB_BRACE);
        $glob = array_filter($glob, 'is_file');

        print_r($current);

        foreach($glob as $index => $file) {
            $current_filename = basename($file);
            $files[$index] = [
                'url' => u(settings::path() . '/tool/' . $current['group'].  '/' . $current['id'] . '/' . $current_filename),
                'filename' => $current_filename,
            ];

            if($current['filename'] == $current_filename) {
                $files[$index]['active'] = true;
            }

            //'active' => ($current['view'] == 'file' && $current['filename'] == $current_filename) ? ' class="active"' : '',
        }
        return $files;
    }
}