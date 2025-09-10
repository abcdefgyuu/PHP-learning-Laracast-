<?php
$db = new Database();
$heading = "Note Detail";



$note = $db->query(
  "SELECT * FROM notes where id=:id",
  [
    'id' => $_GET['id']
  ]
)->findOrFail();


$currentUserId = "1"; 

//if ($note['user_id'] !== $currentUserId) {
//  abort();
//}

require "views/note.view.php";
