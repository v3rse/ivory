<?php
namespace Ivory;

class Router {

  function __construct() {
    $this->route_handlers = [];
  }

  public function get($path, $handler) {
    $this->route_handlers[$path] = $handler;
  }

  public function match($path) {
    return $this->route_handlers[$path];
  }
}
