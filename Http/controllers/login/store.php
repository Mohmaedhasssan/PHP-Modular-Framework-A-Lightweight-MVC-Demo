<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

$attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
];

$loginForm = LoginForm::validate($attributes);

$signedIn = (new Authenticator)->attempt($attributes);

if (!$signedIn) {
    $loginForm->AddError(
        'emailAndPassword',
        'Invalid email or password'
    )
        ->throw();
}

redirect('/');