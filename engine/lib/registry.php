<?php
namespace JensTornell\ComponentKit;
use str;

class Snippet {
	function run() {
		$data = $this->paths($this->root());
		$this->register($data);

		return $data;
	}
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

		$type = ($this->isTemplateFolder($raw)) ? 'template' : 'snippet';

		if(empty($name)) return $data;

		if(!in_array($filename, $this->whitelist($type))) return $data;

		$data[crc32(strval($path))] = [
			'path' => strval($path),
			'raw' => $raw,
			'name' => $this->prefix . $name,
			'type' => $type,
			'filename' => $filename
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

	function isTemplateFolder($name) {
		return (str::startsWith($name, '--') && !str::contains($name, '/')) ? true : false;
	}

	function extension($path) {
		return pathinfo($path)['extension'];
	}

	function folderName($path) {
		$parts = pathinfo($path);
		$name = $this->extractFolder($parts);
		$name = trim($name, '/');
		return $name;
	}

	function extractFolder($parts) {
		return strtr($parts['dirname'], [
			$this->root => '',
			DS => '/'
		]);
	}
	
	function register($data) {
		global $kirby;
		$sets = [];

		if($data) {
			foreach($data as $item) {
				$fname = pathinfo($item['filename'])['filename'];
				
				if($fname == 'component') {
					$registry = $item['type'];
				} else {
					$registry = $fname;
				}
				$sets[] = [
					$registry,
					$item['name'],
					$item['path']
				];
				$kirby->set($registry, $item['name'], $item['path']);
			}
		}
		return $sets;
	}
}