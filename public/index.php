<?php

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'functions.php';
//require  base_path('Database.php');  //db first

spl_autoload_register(function($class){
  require base_path("Core/{$class}.php");
});

require base_path('router.php');
