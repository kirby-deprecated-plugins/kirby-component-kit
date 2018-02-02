<?php
namespace JensTornell\ComponentKit;
use Response;
use tpl;

function toArray($paths) {
    $result = [];

    foreach($paths as $key => $filepath) {
        $path = explode('/', $key);
        $temp = [];
        $p = &$temp;
        $last = array_pop($path);

        foreach($path as $s) {
            $p[$s] = ['_children' => []];
            $p = &$p[$s]['_children'];
        }

        $p[$last] = [
            'path' => $filepath,
            'type' => (pathinfo($filepath)['filename'] == 'snippet') ? 'component' : 'native',
            'id' => $key
        ];
        $result = array_merge_recursive($result, $temp);
    }
    return $result;
}

kirby()->routes(array(
    [
        'pattern' => [
            'component-kit',
            'component-kit/snippet/(:all)'
        ],
        'action'  => function($uid = null) {
            $snippet = new Snippet();
            $root = __DIR__ . DS . '..' . DS . 'snippets';
            $paths = toArray($snippet->paths($snippet->root()));
            $snippet->register($snippet->paths($root, 'ckit/'));

            $data = [
                'root' => $root,
                'paths' => $paths,
                'name' => $uid
            ];
            
            return new Response(
                tpl::load(__DIR__ . DS . '..' . DS . 'templates' . DS . 'home.php', ['data' => $data]), 'html', 200
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
            $paths = toArray($snippet->paths($snippet->root()));
            $snippet->register($snippet->paths($root, 'ckit/'));

            $data = [
                'root' => $root,
                'paths' => $paths,
                'name' => $uid
            ];

            return new Response(
                tpl::load(__DIR__ . DS . '..' . DS . 'templates' . DS . 'preview.php', ['data' => $data]), 'html', 200
            );
        }
    ]
));