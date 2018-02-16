<?php
namespace JensTornell\ComponentKit;

class Core {
    public  function register($dirpath, $prefix = 'ckit/') {
        $this->Snippet = new Snippet();
        $this->Snippet->register($dirpath, $prefix);
    }
}