<?php
namespace JensTornell\ComponentKit;
use Response;
use tpl;

kirby()->routes([
    [
        'pattern' => [
            settings::route(),
            settings::route() . '/(:any)/(:all)',
        ],
        'action'  => function($view = null, $uid = null) {
            switch($view) {
                case null:
                    echo 'Home all alone';
                    break;
                case 'file':
                    $File = new File();
                    $response = $File->run($uid);
                    break;
                case 'preview':
                    $Preview = new Preview();
                    $response = $Preview->run($uid);
                    break;
                case 'image':
                    $ExternalImage = new ExternalImage();
                    $response = $ExternalImage->run($uid);
                    break;
                case 'raw':
                    $ExternalRaw = new ExternalRaw();
                    $response = $ExternalRaw->run($uid);
                    break;
                case 'html':
                    break;
                default:
                    return site()->visit(site()->errorPage());
            }
            return $response;
        }
    ],
]);