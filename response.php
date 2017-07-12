<?php

namespace Ivory;

class Response {
  
  public function send(string $body) {
    $body_length = strlen($body);
    header('Content-Type: text/plain');
    header("Content-Length: $body_length");
    http_response_code(200);
    echo $body;
  }

  public function json($body) { // TODO: MIME issues
    $body = json_encode($body, JSON_PRETTY_PRINT);
    $body_length = strlen($body);
    header('Content-Type: application/json');
    header("Content-Length: $body_length");
    http_response_code(200);
    echo $body;
  }

  public function redirect($url) {
    header("Location: $url"); // TODO: fix redirect url
    http_response_code(301);
  }

}
