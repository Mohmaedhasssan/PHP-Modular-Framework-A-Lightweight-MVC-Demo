<?php

use Core\Database;
use Core\App;

$db=App::resolve(Database::class);

$note = $db->query("SELECT * FROM notes WHERE id=:id", [
    'id' => $_POST['id']
])->findOrAbort();

authorize($note['user_id'] == $_SESSION['user']['id']);

$db->query("DELETE FROM notes WHERE id=:id", [
    'id' => $_POST['id']
]);

header('Location: /notes');
exit();
