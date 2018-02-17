<?php
namespace JensTornell\ComponentKit;

class BarAPI {
    public function set($file) {
        return [
            'bar' => $this->urls($file->component->view, $file->component->id),
        ];
    }

    protected function urls($view, $id) {        
        $root = u(settings::path() . '/');
        $urls = [
            'preview' => [ 'title' => 'Preview',
            ],
            'code' => [
                'title' => 'PHP',
            ],
            'html' => [
                'title' => 'HTML',
            ]
        ];
        
        $array = [];
        foreach($urls as $key => $url) {
            $array[$key] = $url;
            $array[$key]['url'] = $root . 'tool/' . $key . '/' . $id . '/component.php';

            if($view == $key) {    
                $array[$key]['active'] = true;
            }
        }
        return $array;
    }
}