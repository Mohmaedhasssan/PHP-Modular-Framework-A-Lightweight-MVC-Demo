<?php

use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$passowrd = $_POST['password'];

$errors = [];

//validation
if (! Validator::email($email)) {
    $errors['email']='Provide a valid email';
}

if (! Validator::string($passowrd,7,255)) {
    $errors['password']='Provide a valid password that is > 7 characters';
}

if (! empty($errors)){
   return view('register/create.view.php',[
    'errors'=>$errors
   ]);
}

$db=App::resolve(Database::class);
//check if user exist
$user=$db->query('SELECT * FROM users WHERE email = :email',[
    'email'=>$email
])->find() ;

if ($user){
    //if yes,redirect login page
    
    $_SESSION['user']=[
        'email'=>$email
    ];
    header('location: /');
    die();
}else{
    //if no , make on to database ,login redirect
    $user=$db->query('INSERT INTO users (email ,password) VALUE (:email , :password)',[
        'email'=>$email,
        'password'=>$passowrd
    ]);

    $_SESSION['user']=[
        'email'=>$email
    ];
    header('location: /');
    die();
}