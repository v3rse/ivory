<?php
namespace Ivory;

require 'router.php';
require 'response.php';

class Ivory {
  
  function __construct(){
    $this->router = new Router();
  }

  public function run() {
    $path_array = explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    $path = '/' . $path_array[count($path_array) - 1]; 

    $res = new Response();
    $req = $_REQUEST; //TODO: create request wrapper

    $handler = $this->router->match($path);

    if (isset($handler)) {
      $handler($req, $res); 
    }else{
      http_response_code(404);
      echo "Route <strong>$path</strong> not found";
    }
  }

  public function get($path, $handler) {
    $this->router->get($path, $handler); 
  }

}
