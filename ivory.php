<?php
namespace Ivory;

require 'router.php';
require 'response.php';
require 'request.php';
require 'middleware.php';
require '/home/v3rse/.config/composer/vendor/autoload.php';

class Ivory {
  
  function __construct(){
    $this->router = new Router();
    $this->middleware = new Middleware();
  }


  public function run() {
    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    $path_array = $this->router->extractURLPathArray($path);

    $route_info = $this->router->match($path_array);

    $res = new Response();

    if (isset($route_info['handler'])) {
      $req = !empty($route_info['url_params']) ? new Request($route_info['url_params'], $route_info['handler']) : new Request($_REQUEST, $route_info['handler']);
    }else{
      $req = new Request($_REQUEST, function($req, $res){
        http_response_code(404);
        echo "Route <strong>$path</strong> not found";
      });
   }

    $this->middleware->run($req, $res);
  }

  public function get($path, $handler) {
    $this->router->get($path, $handler); 
  }

  public function use($handler) {
    $this->middleware->use($handler);
  }

}
