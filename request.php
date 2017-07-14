<?php

namespace Ivory;

class Request {
  
  function __construct($request_params, $request_handler) {
    $this->params = (new class {});
    foreach($request_params as $key => $params) {
      $this->params->{$key} = $params; 
    }
    $this->handler = $request_handler;
  }

  public function getParam($param_name) {
    return $this->params->{$param_name};
  }

}
