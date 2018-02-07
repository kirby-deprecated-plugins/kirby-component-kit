<?php
namespace JensTornell\ComponentKit;
use Response;
use tpl;

kirby()->routes([
    [
        'pattern' => [
            settings::route(),
            settings::route() . '/snippet/(:all)',
            settings::route() . '/file/(:all)/(:any)',
        ],
        'action'  => function($uid = null, $filename = null) {
            $Helpers = new Helpers();
            $Helpers->toolComponentsRegister();

            echo $filename . "#";

            $flat = $Helpers->coreSnippetArray();

            $args = [
                'root' => $Helpers->toolSnippetRoot(),
                'name' => $uid, //id
                'current' => $Helpers->currrent($uid, $flat),
                'paths' => $Helpers->coreSnippetArrayNested(),
                'flat' => $flat,
            ];

            if(isset($filename)) {
                $args['filename'] = $filename;
                //$args['file_whitelists'] = $Helpers->fileWhitelists();
                $args['file_group'] = $Helpers->fileGroupType($filename);
            }
            
            return new Response(
                tpl::load(
                    __DIR__ . DS . '..' . DS . 'templates' . DS . 'home.php', ['data' => $args]
                ), 'html', 200
            );
        }
    ],
    [
        'pattern' => 'component-kit/preview/(:all)',
        'action' => function($uid) {
            $Helpers = new Helpers();
            $Helpers->toolComponentsRegister();

            $args = [
                'root' => $Helpers->toolSnippetRoot(),
                'name' => $uid, //id
                'paths' => $Helpers->coreSnippetArrayNested(),
                'flat' => $Helpers->coreSnippetArray(),
            ];

            return new Response(
                tpl::load(
                    __DIR__ . DS . '..' . DS . 'templates' . DS . 'preview.php', ['data' => $args]
                ), 'html', 200
            );
        }
    ]
]);