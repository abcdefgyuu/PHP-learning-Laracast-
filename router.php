<?php

$uri = $_SERVER['REQUEST_URI'];
$parsedUri = parse_url($uri, PHP_URL_PATH);


$routes = [
  '/learning' => 'controllers/index.php',
  '/learning/' => 'controllers/index.php',
  '/learning/index.php' => 'controllers/index.php',
  '/learning/about' => 'controllers/about.php',
  '/learning/contact' => 'controllers/contact.php',
  '/learning/notes' => 'controllers/notes.php',
  '/learning/note' => 'controllers/note.php',
];

if(array_key_exists($parsedUri, $routes)) {
  require $routes[$parsedUri];
} 
//else {
//  http_response_code(404);
//  require 'views/404.php';
//  die();
//}
//}