<?php
namespace Ivory;

class Ivory {

  public function run(string $message) {
    $message_length = strlen($message);
    header('Content-Type: text/plain');
    header("Content-Length: $message_length");
    http_response_code(200);
    echo $message;
  }

}
