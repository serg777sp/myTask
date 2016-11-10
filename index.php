<?php
//Шаблон запуска flight, взят из документации
require 'vendor/autoload.php';
require_once 'app/config.php'; //Мой файл настроек

use flight\Engine;

$app = new Engine();
//var_dump($app); die();
$app->route('/', function(){
    $controller = new \App\Controllers\Controller();
    $controller->index();
});
$app->route('/posts', function(){
    $controller = new \App\Controllers\Controller();
    $controller->Posts();
});
$app->route('GET|POST /post/add', function(){
    $controller = new \App\Controllers\PostController();
    $controller->add();
});
$app->route('GET /post/show/@id', function($id){
    $controller = new \App\Controllers\PostController();
    $controller->show($id);
});
$app->route('GET /posts/page/@page', function($page){
    $controller = new \App\Controllers\PostController();
    $controller->paginate($page);
});
$app->route('GET /posts/generate', function(){
    $controller = new \App\Controllers\PostController();
    $controller->generate();
});

$app->start();
