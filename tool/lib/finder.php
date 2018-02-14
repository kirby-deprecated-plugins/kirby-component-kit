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
				if($path->isDir()) continue;

				$dirpath = pathinfo(strval($path))['dirname'];
		
        		if(!in_array($dirpath, $blacklist)) {
					$data = $this->generateData($dirpath, $data);
					$blacklist[] = $dirpath;
				}
			}
		}

		return $data;
	}

	function generateData($dirpath, $data) {
		$raw = $this->folderName($dirpath);
		$id = $this->resolveName($raw);
		$type = $this->type($raw);

		if(empty($id)) return $data;

		$data[] = [
			'path' => $dirpath,
			'type' => $type,
			'id' => $this->prefix . $id,
			'raw' => $raw,
		];

		return $data;
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