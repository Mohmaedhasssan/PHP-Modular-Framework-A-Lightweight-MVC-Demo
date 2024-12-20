<?php
require 'Validator.php';

$config = require "config.php";
$db = new Database($config["database"]);

$heading = 'Create New Note';
$currentUserId = 1;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = [];

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

require "views/notes/create.view.php";
