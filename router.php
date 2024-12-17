<?php 

$uri = parse_url($_SERVER["REQUEST_URI"])['path'];

$routes = [
    '/Demo/' => 'controllers/index.php',
    '/Demo/about' => 'controllers/about.php',
    '/Demo/notes' => 'controllers/notes.php',
    '/Demo/note' => 'controllers/note.php',
    '/Demo/contact' => 'controllers/contact.php',

];


function routingUriToController($uri,$routes) {
    
    if (array_key_exists($uri, $routes)) {
    require $routes[$uri];
} else {
    abort();
}

}


routingUriToController($uri,$routes);