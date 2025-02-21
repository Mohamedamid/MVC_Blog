<?php 
session_start();
require_once 'vendor/autoload.php';
use Routes\Router;

$url = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
$uriClean = str_replace('/blog_app_mvc','', $url);
$uri = parse_url($uriClean,PHP_URL_PATH);

$route = new Router;
$route->dispatch($uri, $method);