<?php

namespace Ivory;

class Middleware {
 
  function __construct() {
    $this->middleware = array();
    $this->currentMiddleware = 0;
  }

  // since PHP is not async don't need next() to tell me when the callback end.. blocking operations.
  public function run($req, $res) {
    // run all middleware
    foreach ($this->middleware as $middlewareHandler){
      $middlewareHandler($req, $res);
    }

    // run request handler
    ($req->handler)($req, $res);
  }

  public function use($handler) {
    array_push($this->middleware, $handler);
  }
}
