<?php

use Core\Database;
use Core\Response;

$db = new Database();

$note = $db->query(
  "SELECT * FROM notes where id=:id",
  [
    'id' => $_GET['id']
  ]
)->findOrFail();

if ($note['user_id'] !== "1") {
  abort(Response::FORBIDDEN);
}

view('notes/edit.view.php', [
  "heading" => "Edit Note",
  "note" => $note
]);
