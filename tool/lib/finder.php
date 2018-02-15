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
}