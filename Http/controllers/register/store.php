<?php

use Core\App;
use Core\Database;
use Http\Forms\RegistrationForm;

$email = $_POST['email'];
$password = $_POST['password'];



if (! RegistrationForm::validate($email, $password))
{
    return view('register/create.view.php', [
        'errors' => RegistrationForm::errors()
    ]);
}


$db = App::resolve(Database::class);
//check if user exist
$user = $db->query('SELECT * FROM users WHERE email = :email', [
    'email' => $email
])->find();

if ($user) {
    //if yes,redirect login page
    login($user);

    header('location: /');
    die();
} else {
    //if no , make on to database ,login redirect
    $user = $db->query('INSERT INTO users (email ,password) VALUE (:email , :password)', [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT)
    ]);

    $_SESSION['user'] = [
        'email' => $email
    ];
    header('location: /');
    die();
}
