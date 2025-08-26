<?php
require 'functions.php';
require 'Database.php';
require 'router.php';


$db = new Database(); 

$sql = 'SELECT * FROM posts'; 
$posts = $db->query($sql)->fetchAll(); //fetch results

dd($posts);

   