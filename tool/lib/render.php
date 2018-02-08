<?php
namespace JensTornell\ComponentKit;
use tpl;
use Exception;

class Render extends \Kirby\Component\Template {
  function snippet($filepath, $data = [], $page = null) {
    $data = $this->data($page, $data);

    if(!file_exists($filepath)) {
      throw new Exception('The template could not be found');
    }

    $tplData = tpl::$data;
    tpl::$data = array_merge(tpl::$data, $data);
    $result = tpl::load($filepath, null);
    tpl::$data = $tplData;

    return $result; 
  }
}