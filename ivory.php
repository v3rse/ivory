<?php
namespace Ivory;

require 'router.php';

class Ivory {
  
  function __construct(){
    $this->router = new Router();
  }

  public function run() {
    $path = '/' . explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))[2];

    $handler = $this->router->match($path);
    if (isset($handler)) {
      $handler($_REQUEST); 
    }else{
      http_response_code(404);
      echo "Route <strong>$path</strong> not found";
    }
  }

  public function get($path, $handler) {
    $this->router->get($path, $handler); 
  }

}
