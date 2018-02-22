<?php
namespace JensTornell\ComponentKit;

class FilesAPI {
    public function set($args) {
        $this->globals = $args->globals;
        return (object)$this->files(
            $args->current->component_root,
            $args->home_url,
            $args->current->id,
            $args->current->filename,
            $args
        );
    }

    private function files($component_root, $home_url, $id, $current_filename, $args) {
        $files = array_filter(glob($component_root . DS . '*'), 'is_file');
        $i = 0;

        foreach($files as $filepath) {
            $filename = basename($filepath);
            $extension = pathinfo($filename)['extension'];
            $group = $this->group($extension);

            $results[$i] = [
                'title' => basename($filepath),
                'url' => $home_url . '/tool/'. $group . '/' . $id . '/' . $filename,
                'group' => $group,
            ];
            $results[$i]['active'] = false;

            if($filepath == $component_root . DS . $current_filename) {
                if($args->current->view == 'code' || $args->current->view == 'image') {
                    $results[$i]['active'] = true;
                }
            }

            $results[$i] = (object)$results[$i];
            $i++;
        }
        return $results;
    }

    protected function group($extension) {
        foreach($this->globals->whitelists as $group => $whitelist) {
            if(in_array($extension, $whitelist)) {
                return $group;
            }
        }
        return 'code';
    }
}