<?php
namespace JensTornell\ComponentKit;

class Snippet {
	function run() {
		$this->register($this->paths($this->root()));
	}
	function root() {
		global $kirby;
		return $kirby->roots->component_kit_snippets;
	}
    function paths($root, $prefix = '') {
		$this->root = $root;

		if(!file_exists($root)) {
			die('The Component kit snippets folder could not be found');
		}
		$iterator = new \RecursiveIteratorIterator(
			new \RecursiveDirectoryIterator($root),
			\RecursiveIteratorIterator::SELF_FIRST
		);
		$iterator->setFlags(\RecursiveDirectoryIterator::SKIP_DOTS);

		if($iterator) {
			foreach ($iterator as $path) {
				if($path->isDir()) continue;
				if(pathinfo($path)['extension'] != 'php') continue;

				if(basename($path) == 'snippet.php') {
					$name = $this->snippetFolderName($path);
				} else {
					$name = $this->snippetFileName($path);
				}
				$paths[$prefix . $name] = strval($path);
			}
		}
		return $paths;
	}

	function snippetFolderName($path) {
		$parts = pathinfo($path);
		$name = $this->extractFolder($parts);
		$name = trim($name, '/');
		return $name;
	}

	function snippetFileName($path) {
		$parts = pathinfo($path);
		$name = $this->extractFolder($parts);
		return trim($name . '/' . $parts['filename'], '/');
	}

	function extractFolder($parts) {
		return strtr($parts['dirname'], [
			$this->root => '',
			DS => '/'
		]);
	}
	
	function register($paths) {
		global $kirby;
		if($paths) {
			foreach($paths as $name => $path) {
				$kirby->set('snippet', $name, $path);
			}
		}
	}
}