<?php
namespace Ivory;

require 'router.php';
require 'response.php';
require 'request.php';
require '/home/v3rse/.config/composer/vendor/autoload.php';

class Ivory {
  
  function __construct(){
    $this->router = new Router();
  }


  public function run() {
    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    $path_array = $this->router->extractURLPathArray($path);

    $route_info = $this->router->match($path_array);

    $res = new Response();
    $req = !empty($route_info['url_params']) ? new Request($route_info['url_params']) : new Request($_REQUEST);
    $handler = $route_info['handler'];

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
