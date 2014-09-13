<?php

class View {
  function __construct($ctrlName) {
    $this->ctrlName       = $ctrlName;
    $this->viewFolderName = strtolower( str_replace('Controller', '', $ctrlName) );
  }

  public function render($viewName = null) {
    $this->viewName = isset($viewName) ? $viewName : 'index';
    require "views/$this->viewFolderName/$this->viewName.php";
  }
}
