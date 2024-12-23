<?php

use Core\Database;
use Core\Validator;


$config = require base_path("config.php");
$db = new Database($config["database"]);

$currentUserId = 1;
$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (!Validator::string($_POST['body'],1,1000)) {
        $errors['body'] = 'A body of Maximum Charactars 1,000 is required';
    }


    if (empty($errors)) {

        $db->query('INSERT INTO notes (body,user_id) VALUES(:body,:user_id)', [
            'body' => $_POST['body'],
            'user_id' => $currentUserId
        ]);
    }
}

view("notes/create.view.php",[
    'heading' =>'Create New Note',
    'errors'=>$errors
]);