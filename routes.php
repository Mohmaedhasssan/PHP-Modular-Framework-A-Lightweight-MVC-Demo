<?php

$router->get('/', 'index.php');
$router->get('/about', 'about.php');
$router->get('/contact', 'contact.php');

$router->get('/notes', 'notes/index.php')->only('auth');
$router->get('/note', 'notes/show.php')->only('auth');
$router->delete('/note', 'notes/destroy.php')->only('auth');

$router->get('/note/edit', 'notes/edit.php')->only('auth');;
$router->patch('/note', 'notes/update.php')->only('auth');;

$router->get('/note/create', 'notes/create.php')->only('auth');;
$router->post('/notes', 'notes/store.php')->only('auth');;

$router->get('/register', 'register/create.php');
$router->post('/register', 'register/store.php');

$router->get('/login', 'login/create.php');
$router->post('/login', 'login/store.php');
$router->delete('/login', 'login/destroy.php');