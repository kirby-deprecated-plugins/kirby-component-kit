<?php
namespace JensTornell\ComponentKit;
use Response;
use tpl;

function toArray($data) {
    $result = [];

    foreach($data as $item) {
        $path = explode('/', $item['name']);
        $temp = [];
        $p = &$temp;
        $last = array_pop($path);

        foreach($path as $s) {
            $p[$s] = ['_children' => []];
            $p = &$p[$s]['_children'];
        }

        $filename = basename($item['path']);

        if($filename == 'template.php' || $filename == 'snippet.php') {

            $p[$last] = [
                'path' => $item['path'],
                'type' => $item['type'],
                'id' => $item['name']
            ];
            $result = array_merge_recursive($result, $temp);
        }
    }
    return $result;
}

kirby()->routes(array(
    [
        'pattern' => [
            settings::route(),
            settings::route() . '/snippet/(:all)',
        ],
        'action'  => function($uid = null) {
            $snippet = new Snippet();
            $root = __DIR__ . DS . '..' . DS . 'snippets';
            $flat = $snippet->paths($snippet->root());
            $paths = toArray($snippet->paths($snippet->root()));
            $snippet->register($snippet->paths($root, 'ckit/'));

            $args = [
                'root' => $root,
                'paths' => $paths,
                'flat' => $flat,
                'name' => $uid
            ];
            
            return new Response(
                tpl::load(__DIR__ . DS . '..' . DS . 'templates' . DS . 'home.php', ['data' => $args]), 'html', 200
            );
        }
    ],
    [
        'pattern' => [
            settings::route() . '/file/(:all)/(:any)',
        ],
        'action' => function($uid, $filename) {
            $snippet = new Snippet();
            $root = __DIR__ . DS . '..' . DS . 'snippets';
            $flat = $snippet->paths($snippet->root());
            $paths = toArray($snippet->paths($snippet->root()));
            $snippet->register($snippet->paths($root, 'ckit/'));

            $args = [
                'root' => $root,
                'paths' => $paths,
                'flat' => $flat,
                'name' => $uid,
                'filename' => $filename
            ];
            
            return new Response(
                tpl::load(__DIR__ . DS . '..' . DS . 'templates' . DS . 'home.php', ['data' => $args]), 'html', 200
            );
        }
    ],
    [
        'pattern' => 'component-kit/assets/css/style.css',
        'action' => function() {
            global $kirby;
            $css = __DIR__ . DS . '..' . DS . 'assets' . DS . 'css' . DS . 'dist' . DS . 'style.css';
            return new Response(file_get_contents($css), 'css', 200);
        }
    ],
    [
        'pattern' => 'component-kit/assets/js/script.min.js',
        'action' => function() {
            global $kirby;
            $js = __DIR__ . DS . '..' . DS . 'assets' . DS . 'js' . DS . 'script.min.js';
            return new Response(file_get_contents($js), 'js', 200);
        }
    ],
    [
        'pattern' => 'component-kit/preview/(:all)',
        'action' => function($uid) {
            $snippet = new Snippet();
            $root = __DIR__ . DS . '..' . DS . 'snippets';
            $flat = $snippet->paths($snippet->root());
            $paths = toArray($snippet->paths($snippet->root()));
            $snippet->register($snippet->paths($root, 'ckit/'));

            $data = [
                'root' => $root,
                'paths' => $paths,
                'name' => $uid,
                'flat' => $flat
            ];

            return new Response(
                tpl::load(__DIR__ . DS . '..' . DS . 'templates' . DS . 'preview.php', ['data' => $data]), 'html', 200
            );
        }
    ]
));