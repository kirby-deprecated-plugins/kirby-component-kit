<?php
namespace JensTornell\ComponentKit;
use str;

class Snippet {
	function run() {
		$this->register(settings::components(), $prefix = null);
	}
	
    function register($root, $prefix = '') {
		global $kirby;
		$this->root = $root;
		$this->prefix = $prefix;

		if(!file_exists($root)) {
			die('The components folder could not be found');
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

				// Path as string
				$path = strval($path);

				// Filename with extension
				$filename = basename($path);

				// Raw name
				$raw_id = $this->rawId($path);

				// Name without --
				$id = $this->id($raw_id);
				if(empty($id)) continue;
				$id = $this->prefix . $id;

				// Stem - Filename without extension
				$stem = pathinfo($filename)['filename'];

				// Type - Template or snippet
				$type = $this->type($raw_id);

				// Allowed - Is filename allowed
				if(!$this->allowed($filename, $type)) continue;

				// Registry - If component, return template or snippet, else the stem
				$registry = ($stem == 'component') ? $type : $stem;

				// Register file
				$kirby->set($registry, $id, $path);
			}
		}
		return $data;
	}

	function type($name) {
		return (str::startsWith($name, '--') && !str::contains($name, '/')) ? 'template' : 'snippet';
	}

	function allowed($filename, $type) {
		$whitelists = [
			'template' => [
				'blueprint.yml',
				'component.php',
				'controller.php',
			],
			'snippet' => [
				'component.php'
			]
		];
		return(in_array($filename, $whitelists[$type]));
	}

	function id($name) {
		$name = (str::startsWith($name, '--')) ? substr($name, 2) : $name;
		$name = str_replace('/--', '/', $name);
		return $name;
	}

	function rawId($path) {
		$parts = pathinfo($path);
		$name = strtr($parts['dirname'], [$this->root => '', DS => '/']);
		$name = trim($name, '/');
		return $name;
	}
}