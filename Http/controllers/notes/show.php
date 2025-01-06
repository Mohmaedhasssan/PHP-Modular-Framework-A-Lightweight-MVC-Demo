<?php

use Core\Database;
use Core\App;

$db=App::resolve(Database::class);

$note = $db->query("SELECT * FROM notes WHERE id=:id", [
    'id' => $_GET['id']
])->findOrAbort();

authorize($note['user_id'] == $_SESSION['user']['id']);

view("notes/show.view.php", [
    'heading' => 'My Notes',
    'note' => $note
]);