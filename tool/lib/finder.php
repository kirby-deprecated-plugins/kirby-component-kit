<?php
namespace JensTornell\ComponentKit;
use str;

class Finder {
	function root() {
		return settings::components();
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
			foreach($iterator as $path) {
				if($path->isDir()) continue;
				$data = $this->generateData($path, $data);
			}
		}

		return $data;
	}

	function generateData($path, $data) {
		$filename = basename($path);
		$raw = $this->folderName($path);
		$name = $this->resolveName($raw);
		$type = $this->type($raw);

		if(empty($name)) return $data;

		if(!in_array($filename, $this->whitelist($type))) return $data;

		$data[] = [
			'path' => strval($path),
			'raw' => $raw,
			'name' => $this->prefix . $name,
			'type' => $type,
			'filename' => $filename,
			'extension' => pathinfo($path)['extension'],
		];

		return $data;
	}

	function whitelist($type) {
		$whitelists = [
			'template' => [
				'blueprint.yml', 'controller.php', 'component.php',
			],
			'snippet' => [
				'component.php'
			]
		];
		return $whitelists[$type];
	}

	function resolveName($name) {
		$name = (str::startsWith($name, '--')) ? substr($name, 2) : $name;
		$name = str_replace('/--', '/', $name);
		return $name;
	}

	function type($name) {
		return (str::startsWith($name, '--') && !str::contains($name, '/')) ? 'template' : 'snippet';
	}

	function folderName($path) {
		$parts = pathinfo($path);
		$name = strtr($parts['dirname'], [$this->root => '', DS => '/']);
		$name = trim($name, '/');
		return $name;
	}
}