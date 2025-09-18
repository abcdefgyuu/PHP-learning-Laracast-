<?php

use Core\Database;
use Core\Response;

$db = new Database();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  //click the delete button from a form

  //first find the user is belong with the note
  $note = $db->query(
    "SELECT * FROM notes where id=:id",
    [
      'id' => $_GET['id']
    ]
  )->findOrFail();

  //if not abort
  if ($note['user_id'] !== "1") {
    abort(Response::FORBIDDEN);
  }

  //if the user is match delete the note
  $db->query(
    "DELETE FROM notes where id=:id",
    [
      'id' => $_POST['note_id']
    ]
  );

  header('location: /notes');
} else {

  $note = $db->query(
    "SELECT * FROM notes where id=:id",
    [
      'id' => $_GET['id']
    ]
  )->findOrFail();


  if ($note['user_id'] !== "1") {
    abort(Response::FORBIDDEN);
  }

  view('notes/show.view.php', [
    "heading" => "Note Detail",
    "note" => $note,
    "currentUserId" => "1"
  ]);
}//endofelse