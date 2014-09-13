<?php

class Controller {
  function __construct($caller) {
    $callerController = get_class($caller);
    $callerRoot       = strtolower( str_replace('Controller', '', $callerController) );
    $this->view = new View($callerRoot);
  }
}
