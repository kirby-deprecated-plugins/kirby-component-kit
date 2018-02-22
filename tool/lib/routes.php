<?php
namespace JensTornell\ComponentKit;
use Response;
use tpl;

kirby()->routes([    
    [
        'pattern' => settings::path() . '/render/image/(:all)',
        'action' => function($uid) {
            $RenderImage = new RouteRenderImage();
            return $RenderImage->set([
                'template' => 'render',
                'view' => 'image',
                'uid' => $uid
            ]);
        }
    ],
    [
        'pattern' => settings::path() . '/render/raw/(:all)',
        'action' => function($uid) {
            $RenderRaw = new RouteRenderRaw();
            return $RenderRaw->set([
                'template' => 'render',
                'view' => 'raw',
                'uid' => $uid
            ]);
        }
    ],
    [
        'pattern' => settings::path(),
        'action' => function() {
            $ToolHome = new RouteToolHome();
            return $ToolHome->set([
                'template' => 'tool',
                'view' => 'home',
            ]);
        }
    ],
    [
        'pattern' => settings::path() . '/tool/code/(:all)',
        'action' => function($uid) {
            $ToolCode = new RouteToolCode();
            return $ToolCode->set([
                'template' => 'tool',
                'view' => 'code',
                'uid' => $uid
            ]);
        }
    ],
    [
        'pattern' => settings::path() . '/tool/html/(:all)',
        'action' => function($uid) {
            $ToolHtml = new RouteToolHtml();
            return $ToolHtml->set([
                'template' => 'tool',
                'view' => 'html',
                'uid' => $uid
            ]);
        }
    ],
    [
        'pattern' => settings::path() . '/tool/image/(:all)',
        'action' => function($uid) {
            $ToolImage = new RouteToolImage();
            return $ToolImage->set([
                'template' => 'tool',
                'view' => 'image',
                'uid' => $uid
            ]);
        }
    ],
    [
        'pattern' => settings::path() . '/tool/preview/(:all)',
        'method' => 'GET|POST',
        'action' => function($uid) {
            $ToolPreview = new RouteToolPreview();
            return $ToolPreview->set([
                'method' => $this->request()->method(),
                'template' => 'tool',
                'view' => 'preview',
                'uid' => $uid
            ]);
        }
    ],
]);