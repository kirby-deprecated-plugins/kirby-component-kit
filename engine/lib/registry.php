<?php
namespace JensTornell\ComponentKit;
use str;
use ckit;

class Snippet {
	function run() {
		$this->register(ckit::directory(), $prefix = null);
	}
	
    function register($root, $prefix = '', $tool = false) {
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
			$blacklist = [];
			$buffer = [];

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

				$dirpath = dirname($path);

				// Type - Template or snippet
				$type = $this->type($raw_id);

				// Allowed - Is filename allowed
				if(!$this->allowed($filename, $type, $tool)) continue;

				// Registry - If component, return template or snippet, else the stem
				if($stem == 'component' || $stem == 'component.preview') {
					$registry = $type;
				} else {
					$registry = $stem;
				}

				// Buffer
				$buffer[$path] = [
					'registry' => $registry,
					'path' => $path,
					'id' => $id,
				];

				// If not tool, never register preview
				if(!$tool) {
					unset($buffer[$dirpath . DS . 'component.preview.php']);
				} else {
					if($stem == 'component.preview') {
						unset($buffer[$dirpath . DS . 'component.php']);
					}
				}	
			}

			if(isset($buffer)) {
				foreach($buffer as $item) {
					$kirby->set($item['registry'], $item['id'], $item['path']);
				}
			}
		}

		return $data;
	}

	function type($name) {
		return (str::startsWith($name, '--') && !str::contains($name, '/')) ? 'template' : 'snippet';
	}

	function allowed($filename, $type, $tool = false) {		
		$whitelists = $this->whitelist();
		if(!$tool) {
			unset($whitelists['template'][3]);
			unset($whitelists['snippet'][1]);
		}
		return(in_array($filename, $whitelists[$type]));
	}

	function whitelist() {
		return [
			'template' => [
				'blueprint.yml',
				'component.php',
				'controller.php',
				'component.preview.php',
			],
			'snippet' => [
				'component.php',
				'component.preview.php',
			]
		];
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