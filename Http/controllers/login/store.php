<?php

use Core\Authenticator;
use Core\Session;
use Http\Forms\LoginForm;

$loginForm = new LoginForm();
$email = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;

if ($loginForm->validate($email, $password)) {
    if ((new Authenticator)->attempt($password, $email)) {
        redirect('/');
        exit;
    }
    
    $loginForm->AddError('emailAndPassword', 'Invalid email or password');
}

Session::flash('errors', $loginForm->errors);
Session::flash('old', ['email' => $email]);

redirect('/login');