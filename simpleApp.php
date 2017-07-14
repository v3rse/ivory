<?php
// Run server with `php -S localhost:[PORTNUMBER]`
require 'ivory.php';

$app = new Ivory\Ivory();

// middleware

$app->use(function($req, $res){
  error_log(sprintf('Request Method: %s, Request Url: %s', $_SERVER['REQUEST_METHOD'] , $_SERVER['REQUEST_URI']));
});

$app->use(function($req, $res){
  error_log('Middleware 2');
});

$app->use(function($req, $res){
  error_log('Middleware 3');
});

$app->get('/morning', function($req, $res) {
  $res->send('Good morning ' . $req->params->name);
});

$app->get('/morning/:name', function($req, $res) {
  $res->send('Good morning ' . $req->params->name);
});

$app->get('/doctor/:who/:laugh', function($req, $res) {
  $res->send('The Doctor. Doctor ' . $req->params->who .' '. $req->params->laugh );
});

$app->get('/night', function($req, $res) {
  $res->send('Good night ' . $req->params->name);
});

$app->get('/go_night', function($req, $res){
  $res->redirect('/simpleApp.php/night');
});

$app->get('/json_night', function($req, $res){
  $res->json(['message' => "Good Night", 'name' => $req->getParam('name')]);
});

$app->run();
