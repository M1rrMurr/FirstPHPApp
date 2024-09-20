<?php


const BASE_PATH = __DIR__ . "/../";

require BASE_PATH . 'vendor/autoload.php';

session_start();

use Core\FormException;
use Core\Router;
use Core\Session;

require '../core/functions.php';

/* spl_autoload_register(function ($class) {
    $class = str_replace("\\", "/", $class);
    require basePath($class . ".php");
}); */

require basePath("bootstrap.php");

$router = new Router();

$uri = parse_url($_SERVER["REQUEST_URI"])["path"];
$routes = require basePath('routes.php');

$method = $_POST["_method"] ?? $_SERVER["REQUEST_METHOD"];

try {
    $router->route($uri, $method);
} catch (FormException $exception) {

    Session::flash('errors', $exception->errors);
    Session::flash('old', $exception->old);

    redirect('/login');
}

Session::unflash();
