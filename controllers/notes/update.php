<?php

use Core\Database;
use Core\Response;
use Core\Validator;

$db = new Database();

//find the cooresponding note
$note = $db->query(
  "SELECT * FROM notes where id=:id",
  [
    'id' => $_POST['id']
  ]
)->findOrFail();

//authorize that the user belongs to the note
if ($note['user_id'] !== "1") {
  abort(Response::FORBIDDEN);
}

//validate form
$errors = [];
if (!Validator::string($_POST['body'])) { //check if body is empty
  $errors['body'] = 'A body field is required';
}

//if there is error return to view
if(count($errors)){
  return view('notes/edit.view.php',[
    "heading" => "Edit Note",
    "note" => $note,
    "errors" => $errors
  ]);
}

//update in db
$db->query("UPDATE notes SET body = :body WHERE notes.id = :id",[
  "body" => $_POST['body'],
  "id" => $_POST['id']
]);

//redirect
header("location: /note?id=" . $_POST['id']);