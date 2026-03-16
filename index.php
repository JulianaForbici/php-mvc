<?php

include 'Controller/TaskController.php';

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($url) {
    case '/':
        echo "Welcome to the homepage. :)";
        break;
    case '/task':
        TaskController::index();
        break;
    case '/task/form':
        TaskController::form();
        break;
        case '/task/form/save':
            TaskController::save();
            break;
        case '/task/delete':
            TaskController::delete();
            break;
    default:
        http_response_code(404);
        echo "404 - Page not found";
}