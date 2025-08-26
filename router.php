<?php
$uri = $_SERVER['REQUEST_URI'];


$routes = [
  '/learning' => 'controllers/index.php',
  '/learning/' => 'controllers/index.php',
  '/learning/index.php' => 'controllers/index.php',
  '/learning/about.php' => 'controllers/about.php',
  '/learning/contact.php' => 'controllers/contact.php',
];

if(array_key_exists($uri, $routes)) {
  require $routes[$uri];
} else {
  http_response_code(404);
  require 'views/404.php';
  die();
}