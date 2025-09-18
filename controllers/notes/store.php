<?php

use Core\Validator;
use Core\Database;

$db = new Database();

$errors = [];

if (!Validator::string($_POST['body'])) { //check if body is empty
  $errors['body'] = 'A body field is required';
}

if (!empty($errors)) {

  return view('notes/create.view.php', [
    "heading" => "Create Note",
    "errors" => $errors
  ]);
}



$db->query("INSERT INTO notes (body, user_id) VALUES (:body,:user_id)", [
  'body' => $_POST['body'],
  'user_id' => 1
]);

header('location: /notes');
die();
