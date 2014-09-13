<?php

class Controller {
  function __construct($caller) {
    $callerCtrlName = get_class($caller);
    $this->view = new View($callerCtrlName);
  }

  public function index() {}
}
