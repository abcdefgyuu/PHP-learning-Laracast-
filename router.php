<?php

$uri = $_SERVER['REQUEST_URI'];
$parsedUri = parse_url($uri, PHP_URL_PATH);


$routes = [
  '/' => 'controllers/index.php',
  '/index.php' => 'controllers/index.php',
  '/about' => 'controllers/about.php',
  '/contact' => 'controllers/contact.php',
  '/notes' => 'controllers/notes/index.php',
  '/note' => 'controllers/notes/show.php',
  '/notes/create' => 'controllers/notes/create.php',
];

if(array_key_exists($parsedUri, $routes)) {
  require $routes[$parsedUri];
} 
else {

  abort();
  //http_response_code(404);
  //require 'views/404.php';
  //die();
}
