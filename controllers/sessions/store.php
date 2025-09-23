<?php

use Core\Validator;
use Core\Database;

$db = new Database();
$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

//validate the input
if (!Validator::email($email)) {
  $errors['email'] = "Please provide a valid email";
}

if (!Validator::string($password)) {
  $errors['password'] = "Please provide a valid password";
}

if (!empty($errors)) {
  return view('sessions/create.view.php', [
    'errors' => $errors
  ]);
}


//match the credentials
$user = $db->query('SELECT * FROM users WHERE email = :email', [
  'email' => $email
])->find();

if ($user) {
  if (password_verify($password, $user['password'])) {
    login([
      'email' => $email
    ]);

    header('location: /');
    exit();
  }
}



return view('sessions/create.view.php', [
  'errors' => [
    'password' => 'Invalid password'
  ]
]);
