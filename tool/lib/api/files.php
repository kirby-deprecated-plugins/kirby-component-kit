<?php
namespace JensTornell\ComponentKit;

class FilesAPI {
    private $Core;
    private $Finder;
    private $Globals;

    public function __construct() {
        $this->Core = new Core();
        $this->Finder = new finder();
        $this->Globals = new Globals();
    }

    public function set() {
        $this->globals = $this->Globals->set();
        $core = $this->globals->core;

        $this->Core->register($core->roots->components);
        
        $this->flat = $this->setFlat($core->roots->components);

        return (object)[
            'flat' => $this->flat,
            'nested' => $this->setNested()
        ];
    }

    private function setFlat($root) {
        return $this->Finder->paths($root);
    }

    private function setNested() {
        return $this->Finder->dataToNested($this->flat);
    }
}

#$test = new FilesAPI(new Globals());
#$array = $test->set();

#print_r($array);

#die;