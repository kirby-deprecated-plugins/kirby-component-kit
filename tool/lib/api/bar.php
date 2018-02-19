<?php
namespace JensTornell\ComponentKit;

class BarAPI {
    public function set($args) {
        return [
            'bar' => $this->urls($args['view'], $args['id']),
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
            $array[$key]['active'] = false;

            if($view == $key) {    
                $array[$key]['active'] = true;
            }
            $array[$key] = (object)$array[$key];
        }
        return (object)$array;
    }
}