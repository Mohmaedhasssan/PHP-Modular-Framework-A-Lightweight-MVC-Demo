<?php 

$uri = parse_url($_SERVER["REQUEST_URI"])['path'];

$routes = [
    '/Demo/' => 'controllers/index.php',
    '/Demo/about' => 'controllers/about.php',
    '/Demo/contact' => 'controllers/contact.php',

];


function routingUriToController($uri,$routes) {
    
    if (array_key_exists($uri, $routes)) {
    require $routes[$uri];
} else {
    abort();
}

}
function abort($code=404)
{

    http_response_code($code);

    require "views/{$code}.php";  // ToDo : Check for $code view if exists

    die();

}

routingUriToController($uri,$routes);