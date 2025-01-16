<?php

use Demo\Core\Authenticator;
use Http\Forms\LoginForm;

$loginForm = new LoginForm();
$email = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;

if ($loginForm->validate($email, $password)) {
    if ((new Authenticator)->attempt($password, $email)) {
        redirect('/');
    } else {
        $loginForm->AddError('email', 'Invalid email or password');
    }
}

return view('login/create.view.php', [
    'errors' => $loginForm->errors
]);