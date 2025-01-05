<?php

use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;

$errors = [];

// Validation
if (!Validator::email($email)) {
    $errors['email'] = 'Provide a valid email';
}

if (!Validator::string($password)) {
    $errors['password'] = 'Provide a valid password';
}

if (!empty($errors)) {
    return view('login/create.view.php', [
        'errors' => $errors
    ]);
}

$db=App::resolve(Database::class);

$user=$db->query('SELECT * FROM users WHERE email = :email',[
    'email'=>$email
])->find() ;

if (! $user || ! password_verify($password,$user['password'])){
    $errors['email']='Invalid email or password';
    return view('login/create.view.php',[
        'errors'=>$errors
    ]);
}

login($user);

header('location: /');
die();