<?php
$db = new Database();

$note = $db->query(
  "SELECT * FROM notes where id=:id",
  [
    'id' => $_GET['id']
  ]
)->findOrFail();


//if ($note['user_id'] !== $currentUserId) {
//  abort();
//}

view('notes/show.view.php',[
  "heading"=>"Note Detail",
  "note" => $note,
  "currentUserId" => "1"
]);
