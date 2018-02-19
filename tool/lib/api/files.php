<?php
namespace JensTornell\ComponentKit;

class FilesAPI {
    public function set($file) {
        return (object)$this->files(
            $file->current->component_root,
            $file->current->component_root_url,
            $file->current->id,
            $file->current->filename
        );
    }

    private function files($component_root, $component_root_url, $id, $current_filename) {
        $files = array_filter(glob($component_root . DS . '*'), 'is_file');
        $i = 0;

        foreach($files as $filepath) {
            $filename = basename($filepath);
            $extension = pathinfo($filename)['extension'];
            $group = $this->group($extension);

            $results[$i] = [
                'title' => basename($filepath),
                'url' => $component_root_url . '/'. $group . '/' . $id . '/' . $filename,
                'group' => $group,
            ];
            $results[$i]['active'] = false;

            if($filepath == $component_root . DS . $current_filename) {
                $results[$i]['active'] = true;
            }

            $results[$i] = (object)$results[$i];
            $i++;
        }
        return $results;
    }

    protected function group($extension) {
        $whitelists = [
            'code' => [
                'css', 'js', 'scss', 'sass', 'less', 'php', 'yaml', 'yml'
            ],
            'image' => [
                'jpg', 'jpeg', 'png', 'gif'
            ]
        ];
        foreach($whitelists as $group => $whitelist) {
            if(in_array($extension, $whitelist)) {
                return $group;
            }
        }
    }
}