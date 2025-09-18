<?php
use Core\Database;

$db = new Database();
$notes = $db->query("SELECT * FROM notes where user_id=1")->getAll();

view('notes/index.view.php',[
  "heading"=>"Note List",
  "notes" => $notes,
]);

