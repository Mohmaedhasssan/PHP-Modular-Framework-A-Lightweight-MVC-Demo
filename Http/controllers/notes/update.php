<?php

use Core\Database;
use Core\Validator;
use Core\App;

$db=App::resolve(Database::class);
$errors = [];

//find the corrisponding note
$note = $db->query("SELECT * FROM notes WHERE id=:id", [
    'id' => $_POST['id']
])->findOrAbort();

//fprm Validation
if (!Validator::string($_POST['body'],1,1000)) {
    $errors['body'] = 'A body of Maximum Charactars 1,000 is required';
}

//User Aurhorization
authorize($note['user_id'] == $_SESSION['user']['id']);



if (!empty($errors)) {
    return view("notes/edit.view.php",[
        'heading' =>'Edit Note',
        'errors'=>$errors,
        'note'=>$note
    ]);
}

$db->query('UPDATE notes SET body =:body WHERE id = :id', [
    'body' => $_POST['body'],
    'id' => $_POST['id'],
]);

header('Location: /notes');
die();