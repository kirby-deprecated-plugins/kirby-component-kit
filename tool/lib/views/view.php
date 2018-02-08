<?php
namespace JensTornell\ComponentKit;

class View {
    public function __construct() {
        $this->Helpers = new Helpers();
        $this->Helpers->toolComponentsRegister();
    }

    protected function args($uid) {
        $flat = $this->Helpers->coreSnippetArray();
        $args = [
            'route' => settings::route(),
            'current' => $this->Helpers->currrent($uid, $flat),
            'name' => $uid, //id
            'flat' => $flat,
            'paths' => $this->Helpers->coreSnippetArrayNested(),
            'root' => $this->Helpers->toolSnippetRoot(),
        ];
        return $args;
    }
}