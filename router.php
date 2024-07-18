<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];


$routes = [
    '/notes/' => 'controllers/index.php',
    '/notes/create' => 'controllers/create.php',
    '/notes/read' => 'controllers/read.php',
    '/notes/update' => 'controllers/update.php',
    '/notes/delete' => 'controllers/delete.php',
];


if(array_key_exists($uri, $routes)){
    require $routes[$uri];
}
else{
    http_response_code(404);
    echo '404 Not Found';
    die;
}
