<?php
namespace JensTornell\ComponentKit;

class ComponentsAPI {
    public function set($dirpath, $Finder) {
        $flat = $this->setFlat($Finder, $dirpath);

        $output = $Finder->dataToNested($flat);

        return (object)[
            'flat' => $flat,
            'nested' => $output['results'],
            'file_count' => $output['file_count'],
            'component_count' => $output['component_count'],
        ];
    }

    private function setFlat($Finder, $root) {
        return $Finder->paths($root);
    }
}