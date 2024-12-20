<?php



$heading = 'Create New Note';
 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    dd($_POST);
}

require "views/create-note.view.php";