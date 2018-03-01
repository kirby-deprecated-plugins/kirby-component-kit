<?php
namespace JensTornell\ComponentKit;
use tpl;

class SnippetComponent extends \Kirby\Component\Snippet {
  public function file($name) {
    return $this->kirby->roots()->snippets() . DS . str_replace('/', DS, $name) . '.php';
  }

  public function render($name, $data = [], $return = false) {
    $results = kirby()->get('option', 'ckit.results');

    if(isset($results) && is_array($results) && is_array($data)) {
        $data = array_merge($results, $data);
    }
    if(is_object($data)) $data = ['item' => $data];
    return tpl::load($this->kirby->registry->get('snippet', $name), $data, $return);
  }
}

$kirby->set('component', 'snippet', 'JensTornell\ComponentKit\SnippetComponent');