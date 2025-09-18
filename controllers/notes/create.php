<?php

use Core\Database;
use Core\Validator;

$db = new Database();

  $errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  if (!Validator::string($_POST['body'])) { //check if body is empty
    $errors['body'] = 'A body field is required';
  }

  if (empty($errors)) {
    $db->query("INSERT INTO notes (body, user_id) VALUES (:body,:user_id)", [
      'body' => $_POST['body'],
      'user_id' => 1
    ]);
  }

}

view('notes/create.view.php',[
  "heading"=>"Create Note",
  "errors" => $errors
]);
