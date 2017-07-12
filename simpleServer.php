<?php
// Run server with `php -S localhost:[PORTNUMBER]`
$message = 'Hello, HTTP';
$message_length = strlen($message);
header('Content-Type: text/plain');
header("Content-Length: $message_length");
http_response_code(200);
echo $message;
