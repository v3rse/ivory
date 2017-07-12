<?php

namespace Ivory;

class Request {
  
  function __construct($request_global) {
    $this->params = (new class {});
    foreach($request_global as $key => $params) {
      $this->params->{$key} = $params; 
    }
  }

  public function getParam($param_name) {
    return $this->params->{$param_name};
  }

}
