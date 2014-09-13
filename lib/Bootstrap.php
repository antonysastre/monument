<?php

class Bootstrap {
  function __construct() {
    $url = isset($_GET['url']) ? $_GET['url'] : null;
    $url = rtrim($url, '/');
    $url = explode('/', $url);

    if (empty($url[0])) {
      require 'controllers/IndexController.php';
      $controller = new IndexController();
      $controller->view->render('index');
      return false;
    }

    $controllerName = ucfirst($url[0]) . 'Controller';
    $actionName     = $url[1];
    $arg            = $url[2];

    $fileName = 'controllers/' . $controllerName . '.php';
    if (file_exists($fileName)) {
      require $fileName;
    } else {
      throw new Exception("File `$fileName` does not exist.");
    }

    $controller = new $controllerName;

    if ( isset($arg) and isset($actionName) ) {
      $controller->{$actionName}($arg);
    } elseif( isset($actionName) ) {
      $controller->{$actionName}();
    }

    $controller->view->render($actionName);
  }
}
