<?php
// Run server with `php -S localhost:[PORTNUMBER]`
require 'ivory.php';

$app = new Ivory\Ivory();

$app->get('/morning', function($req, $res) {
  $res->send('Good morning');
});

$app->get('/night', function($req, $res) {
  $res->send('Good night');
});

$app->get('/go_night', function($req, $res){
  $res->redirect('/simpleApp.php/night');
});

$app->get('/json_night', function($req, $res){
  $res->json(['message' => "Good Night"]);
});

$app->run();
