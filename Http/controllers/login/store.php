<?php

use Core\App;
use Core\Database;
use Http\Forms\LoginForm;

$email = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;

if (! LoginForm::validate($email, $password))
{
    return view('login/create.view.php', [
        'errors' => LoginForm::errors()
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