<?php
require "../init.php";

$pathInfo = $_SERVER['PHP_SELF'];
$routes = [
    'index' => [
        'controller' => 'postsController',
        'method' => 'index'],
    'post' => [
        'controller' => 'postsController',
        'method' => 'show']
];

$filepath = str_replace('\\', '/', $pathInfo);
$path_parts = pathinfo($filepath);

if(isset($routes[$path_parts['filename']])) {
    $route = $routes[$path_parts['filename']];

    /** @var \App\Core\Container $container */
    $controller = $container->make($route['controller']);
    $method = $route['method'];
    $controller->$method();
}
?>
