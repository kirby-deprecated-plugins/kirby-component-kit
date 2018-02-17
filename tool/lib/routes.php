<?php
namespace JensTornell\ComponentKit;
use Response;
use tpl;

kirby()->routes([
    [
        'pattern' => settings::path() . '/tool/code/(:all)',
        'action' => function($uid) {
            $Code = new Code();
            $response = $Code->run($uid);
            return $response;
        }
    ],
    [
        'pattern' => settings::path() . '/tool/image/(:all)',
        'action' => function($uid) {
            $Globals = new Globals();
            $Core = new Core();
            $File = new FileAPI();
            $Image = new ImageAPI();
            $Bar = new BarAPI();

            $globals = $Globals->set();
            $file = $File->set('tool', 'image', $uid);
            $image = $Image->set($globals, $file);

            $bar = $Bar->set($file);

            print_r($bar);

            $results = (object)array_merge(
                (array)$file,
                (array)$image,
                (array)$bar
            );
            
            print_r($results);

            return $response;
        }
    ],
    [
        'pattern' => settings::path() . '/tool/preview/(:all)',
        'action' => function($uid) {
            $File = new FileAPI();
            $Image = new ImageAPI();

            $file = $File->set('tool', 'preview', $uid);
            print_r($file);
            #die;

            /*$Preview = new Preview();
            $response = $Preview->run($uid);
            return $response;*/
        }
    ],
    [
        'pattern' => settings::path() . '/render/image/(:all)',
        'action' => function($uid) {
            $ExternalImage = new ExternalImage();
            $response = $ExternalImage->run($uid);
            return $response;
        }
    ],
    [
        'pattern' => settings::path() . '/render/raw/(:all)',
        'action' => function($uid) {
            $ExternalRaw = new ExternalRaw();
            $response = $ExternalRaw->run($uid);
            return $response;
        }
    ],
    [
        'pattern' => [
            settings::path(),
            settings::path() . '/(:any)/(:all)',
        ],
        'action'  => function($view = null, $uid = null) {
            switch($view) {
                case null:
                    $Home = new Home();
                    $response = $Home->run($uid);
                    break;
                /*case 'image':
                    $ExternalImage = new ExternalImage();
                    $response = $ExternalImage->run($uid);
                    break;
                case 'raw':
                    $ExternalRaw = new ExternalRaw();
                    $response = $ExternalRaw->run($uid);
                    break;*/
                case 'html':
                    $Html = new Html();
                    $response = $Html->run($uid);
                    break;
                default:
                    return site()->visit(site()->errorPage());
            }
            return $response;
        }
    ],
]);