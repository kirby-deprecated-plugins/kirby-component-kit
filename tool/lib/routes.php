<?php
namespace JensTornell\ComponentKit;
use Response;
use tpl;
use ckit;

kirby()->routes([    
    [
        'pattern' => ckit::path() . '/render/image/(:all)',
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
        'pattern' => ckit::path() . '/render/raw/(:all)',
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
        'pattern' => ckit::path(),
        'action' => function() {
            $ToolHome = new RouteToolHome();
            return $ToolHome->set([
                'template' => 'tool',
                'view' => 'home',
            ]);
        }
    ],
    [
        'pattern' => ckit::path() . '/tool/code/(:all)',
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
        'pattern' => ckit::path() . '/tool/html/(:all)',
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
        'pattern' => ckit::path() . '/tool/image/(:all)',
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
        'pattern' => ckit::path() . '/tool/dashboard/(:all)',
        'action' => function($uid) {
            $uid .= '/.dashboard';
            $ToolMissing = new RouteToolMissing();
            return $ToolMissing->set([
                'template' => 'tool',
                'view' => 'dashboard',
                'uid' => $uid
            ]);
        }
    ],
    [
        'pattern' => ckit::path() . '/tool/preview/(:all)',
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