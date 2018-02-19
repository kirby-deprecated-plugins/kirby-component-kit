<?php
namespace JensTornell\ComponentKit;

class ComponentsAPI {
    public function set($dirpath, $Finder) {
        $flat = $this->setFlat($Finder, $dirpath);

        return (object)[
            'flat' => $flat,
            'nested' => $this->setNested($Finder, $flat)
        ];
    }

    private function setFlat($Finder, $root) {
        return $Finder->paths($root);
    }

    private function setNested($Finder, $flat) {
        return $Finder->dataToNested($flat);
    }
}