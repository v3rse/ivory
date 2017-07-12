<?php
// Run server with `php -S localhost:[PORTNUMBER]`
require 'ivory.php';

$app = new Ivory\Ivory();

$app->get('/morning', function($req) {
  $message = 'Good morning';
  $message_length = strlen($message);
  header('Content-Type: text/plain');
  header("Content-Length: $message_length");
  http_response_code(200);
  echo $message;
});

$app->get('/night', function($req) {
  $message = 'Good night';
  $message_length = strlen($message);
  header('Content-Type: text/plain');
  header("Content-Length: $message_length");
  http_response_code(200);
  echo $message;
});

$app->run();
