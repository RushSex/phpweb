<?php
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/models/Database.php';
require_once __DIR__ . '/controllers/BaseController.php';
require_once __DIR__ . '/controllers/HomeController.php';
require_once __DIR__ . '/controllers/ServicesController.php';
require_once __DIR__ . '/controllers/ReviewsController.php';
require_once __DIR__ . '/controllers/ContactsController.php';

$config = require __DIR__ . '/config/config.php';
$db = new Database($config['db']);

$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$routes = [
    '/' => [HomeController::class, 'index'],
    '/services' => [ServicesController::class, 'index'],
    '/reviews' => [ReviewsController::class, 'index'],
    '/contacts' => [ContactsController::class, 'index'],
];

if (array_key_exists($requestUri, $routes)) {
    [$controllerClass, $method] = $routes[$requestUri];
    $controller = new $controllerClass();
    $controller->$method();
} else {
    echo "Страница не найдена";
}