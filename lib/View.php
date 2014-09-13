<?php

class View {
  function __construct($viewParent) {
    $this->viewParent  = $viewParent;
    $this->viewName    = "index";
  }

  public function render($viewName) {
    if (isset($viewName)) { $this->viewName = $viewName; }
    require 'views/' . $this->viewParent . '/' . $this->viewName . '.php';
  }
}
