<?php
namespace Ivory;
require '/home/v3rse/.config/composer/vendor/autoload.php';

class Router {

  function __construct() {
    $this->route_handlers = [];
  }

  public function extractURLPathArray($path){
    $path_array = explode('/', $path);

    // remove first empty string
    array_shift($path_array);

    // remove php files in the path 
    if(strpos($path_array[0], '.php') !== false){
      array_shift($path_array); 
    }
    return $path_array;
  }

  public function get($path, $handler) {
    $this->route_handlers[$path] = $handler;
  }

  public function match($path_array) {
    $route_info = array();
    foreach($this->route_handlers as $route => $handler) {
      $route_array = $this->extractURLPathArray($route);
      if(($route_array[0] == $path_array[0]) && 
        (count($route_array) == count($path_array))) // TODO: recursively check route match
      {
        $url_params = $this->getURLParams($path_array, $route_array);
        return array("url_params" => $url_params, "handler" => $handler);
      }
    }
    return $route_info; 
  }

  public function getURLParams($path_array, $route_array) {
    $url_params = [];
    for($i = 0; $i < count($route_array); $i++){
      $r = $route_array[$i];
      $p = $path_array[$i];
      if (':' === $r[0]) {
       $url_params[substr($r, 1)] = $p; 
      }
    }
    return $url_params;
  }
}
