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

    // REMOVE
    function filesize($bytes) {
        if ($bytes == 0)
            return "0 byte";
    
        $s = array('byte', 'kB', 'MB', 'GB', 'TB', 'PB');
        $e = floor(log($bytes, 1024));
    
        return round($bytes/pow(1024, $e), 2). ' ' . $s[$e];
    }
}