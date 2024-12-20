<?php

$config = require "config.php";
$db = new Database($config["database"]);

$heading = 'My Notes';
 

$note = $db->query("SELECT * FROM notes WHERE id=:id", ['id' => $_GET['id']])->findOrAbort();

$currentUserId=1;
authorize($note['user_id'] == $currentUserId);

require "views/notes/show.view.php";