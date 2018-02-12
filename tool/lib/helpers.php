<?php
namespace JensTornell\ComponentKit;

class Helpers {
    public function __construct() {
        $this->Finder = new Finder();
    }

    public function fileWhitelists() {
        $whitelists = [
            'code' => [
                'css', 'js', 'scss', 'sass', 'less', 'php', 'yaml', 'yml'
            ],
            'image' => [
                'jpg', 'jpeg', 'png', 'gif'
            ]
        ];
        return $whitelists;
    }

    // Returns code or image dending on the type
    public function fileGroupType($filename) {
        $extension = pathinfo($filename)['extension'];
        foreach($this->fileWhitelists() as $grouptype => $collections) {
            $whitelists_code = $this->fileWhitelists()['code'];
            if(in_array($extension, $collections)) {
                return $grouptype;
            }
        }
    }
}