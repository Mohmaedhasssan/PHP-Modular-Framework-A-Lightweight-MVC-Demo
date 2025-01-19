<?php

use Core\Router;
use Core\Session;
use Core\Validation\ValidationException;

session_start();

const BASE_PATH = __DIR__ . "/../";

require BASE_PATH . "Core/functions.php";

spl_autoload_register(function ($class) {
    // $class=str_replace("\\","/",$class);    //the path works with this / and \ as separator
    require base_path("{$class}.php");
});


require base_path('bootstrap.php');

$router = new Router();

$routes = require base_path('routes.php');

$uri = parse_url($_SERVER["REQUEST_URI"])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

try{
    $router->route($uri,$method);
}catch(ValidationException $e){
    
    Session::flash('errors', $e->errors);
    Session::flash('old', $e->old);

    redirect($router->previousUrl());
}

Session::unflash();