<?php
$db = new Database();
$heading = "Note Detail";

$note = $db->query(
  "SELECT * FROM notes where user_id=:user_id and id=:id",
  [
    'user_id' => 1,
    'id' => $_GET['id']
  ]
)->fetch();

if(!$note) {
  abort();
}
  require "views/note.view.php";



