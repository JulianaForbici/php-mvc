<?php

include 'Controller/TaskController.php';
include 'Controller/HomeController.php';

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$routes = [
    '/' => 'HomeController@index',
    '/task' => 'TaskController@index',
    '/task/form' => 'TaskController@form',
    '/task/form/save' => 'TaskController@save',
    '/task/delete' => 'TaskController@delete',
];

if(isset($routes[$url])){
    list($controller, $method) = explode('@', $routes[$url]);
    $controller::$method();
} else {
    http_response_code(404);
    echo "404 - Page not found";
}