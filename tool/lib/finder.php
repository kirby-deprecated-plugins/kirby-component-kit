<?php
namespace JensTornell\ComponentKit;
use str;

class Finder {
	function root() {
		return settings::directory();
	}
    function paths($root, $prefix = '') {
		$this->root = $root;
		$this->prefix = $prefix;

		if(!file_exists($root)) {
			die('The Component kit folder could not be found');
		}
		$iterator = new \RecursiveIteratorIterator(
			new \RecursiveDirectoryIterator($root),
			\RecursiveIteratorIterator::SELF_FIRST
		);
		$iterator->setFlags(\RecursiveDirectoryIterator::SKIP_DOTS);

		if($iterator) {
			$data = [];
			$blacklist = [];
			
			foreach($iterator as $path) {
				if($path->isDir()) {
					$generated = $this->generateData($path->getPathname());
					$key = crc32($path->getPathname());

					$data[$key] = $generated;
					$data[$key]['count'] = 0;
				} else {
					$key = crc32(dirname($path->getPathname()));

					if(isset($data[$key])) {
						$key = crc32(dirname($path->getPathname()));
						$data[$key]['count']++;

						if(!isset($data[$key]['first']) || $path->getFilename() == 'component.php') {
							$data[$key]['first'] = $path->getFilename();
						}
					}
				}
			}
		}
		return $data;
	}

	function generateData($dirpath) {
		$raw = $this->folderName($dirpath);
		$id = $this->resolveName($raw);
		$type = $this->type($raw);

		return [
			'path' => $dirpath,
			'type' => $type,
			'id' => $this->prefix . $id,
			'raw' => $raw,
		];
	}

	function resolveName($name) {
		$name = (str::startsWith($name, '--')) ? substr($name, 2) : $name;
		$name = str_replace('/--', '/', $name);
		return $name;
	}

	function type($name) {
		return (str::startsWith($name, '--') && !str::contains($name, '/')) ? 'template' : 'snippet';
	}

	function folderName($dirpath) {
		$name = strtr($dirpath, [$this->root => '', DS => '/']);
		$name = trim($name, '/');
		return $name;
	}

	public function dataToNested($data) {
		$results = [];
		$file_count = 0;
		$component_count = 0;
    
        foreach($data as $item) {
            $path = explode('/', $item['id']);
            $temp = [];
            $p = &$temp;

            $last = array_pop($path);
    
            foreach($path as $s) {
                $p = &$p[$s]['_children'];
            }
    
            $filename = basename($item['path']);
            $dir = pathinfo($item['path'])['dirname'];
            $p[$last] = [
                'path' => $dir,
                'type' => ($item['count'] == 0) ? 'empty' : $item['type'],
                'id' => $item['id'],
                'raw' => $item['raw'],
                'count' => $item['count'],
                'first' => (isset($item['first'])) ? $item['first'] : null,
                'aside_url' => $this->asideUrl($item),
            ];

			$file_count += $item['count'];
			$component_count++;
            $results = array_merge_recursive($results, $temp);
		}
		$output['file_count'] = $file_count;
		$output['component_count'] = $component_count;
		$output['results'] = $results;

        return $output;
	}
	
	protected function asideUrl($item) {
        if(isset($item['first'])) {
            $type = ($item['first'] == 'component.php') ? 'preview' : 'code';
            return u(settings::path() . '/tool/' . $type . '/' . $item['id'] . '/' . $item['first']);
        }
    }
}