<?php
return function($site, $pages, $page) {
  return [
    'title' => $page->title()->html(),
    'text' => $page->text()->kirbytext()
  ];
};