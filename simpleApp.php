<?php
// Run server with `php -S localhost:[PORTNUMBER]`
require 'ivory.php';

$app = new Ivory\Ivory();

$app->run("Hello HTTP from Ivory");
