<?php

use Core\Database;
use Core\Validator;

$db = new Database();
$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

//validate the input
if (!Validator::email($email)) {
  $errors['email'] = "Please provide a valid email";
}

if (!Validator::string($password, 8, 255)) {
  $errors['password'] = "Please provide a password of at least 8 character";
}

if (!empty($errors)) {
  return view('registration/create.view.php', [
    'errors' => $errors
  ]);
}

  $user = $db->query(
    "SELECT * FROM users where email=:email",
    [
      'email' => $email
    ]
  )->find();

if ($user['email'] === $email) {
  $errors['email'] = "User already exists";
  return view('registration/create.view.php', [
    'errors' => $errors
  ]);
}
else {

  $db->query(
    "INSERT INTO users (email, password) VALUES (:email, :password)",
    [
      'email' => $email,
      'password' => $password
    ]
  );

  $_SESSION['user'] = [
    'email' => $email
  ];

  header('Location: /');
  exit();
}


