<?php
namespace JensTornell\ComponentKit;
use str;

class Snippet {
	function run() {
		$data = $this->paths($this->root());
		$this->register($data);
	}
	function root() {
		return settings::components();
	}
    function paths($root, $prefix = '') {
		$this->root = $root;
		$this->prefix = $prefix;

		if(!file_exists($root)) {
			die('The Component kit snippets folder could not be found');
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
		$name = $this->snippetFolderName($path);

		if(empty($name)) return $data;

		if($this->isTemplateFolder($name)) {
			$name = $this->resolveName($name);
			$type = 'template';

			if(!in_array($filename, $this->templateWhitelist())) return $data;

		} elseif($filename == 'snippet.php') {
			$name = $this->resolveName($name);
			$type = 'snippet';
		}

		if(!isset($type)) return $data;

		$data[md5(strval($path))] = [
			'path' => strval($path),
			'name' => $this->prefix . $name,
			'type' => $type,
			'filename' => $filename
		];

		return $data;
	}

	function templateWhitelist() {
		return [
			'blueprint.yml', 'controller.php', 'template.php',
		];
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

	function snippetFolderName($path) {
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
		if($data) {
			foreach($data as $item) {
				$fname = pathinfo($item['filename'])['filename'];
				$kirby->set($fname, $item['name'], $item['path']);
			}
		}
	}
}