<?php
namespace JensTornell\ComponentKit;
use Media;
use Response;
use f;
use ckit;

if(ckit::get('assets')) {
    kirby()->set('route', [
        'pattern' => ckit::get('assets') . '/(:all)/(:any)',
        'method'  => 'GET',
        'action'  => function($id, $filename) {
            $Globals = new GlobalsAPI();

            $whitelists = $Globals->whitelists();
            $whitelist = array_merge($whitelists->code, $whitelists->image);
            unset($whitelist['php']);

            $whitelist = array_flip($whitelist);
            unset($whitelist['php']);
            $whitelist = array_flip($whitelist);

            $filepath = str_replace('/', DS, ckit::directory() . DS . $id . DS . $filename);
            $extension = f::extension($filepath);
            $error = new Response('The file could not be found', $extension, 404);

            if(!in_array($extension, $whitelist)) return $error;
            if(!f::exists($filepath)) return $error;
            
            return new Response(f::read($filepath), $extension);
        }
    ]);
}