<?php

require 'Router.php';
require 'UserController.php';

use Webapp\src\Controller\UserController;
use Webapp\src\Controller\MediumController;
use Webapp\src\Routing\Router;

// DB connection

$router = new Router();
$userController = new UserController;
$mediumController = new MediumController;

$router->addRoute("POST",  "/LandingPage", [$userController, "landingPageView"]);
$router->addRoute("POST", "/Login", [$userController, "loginView"]);
$router->addRoute("POST", "/User", [$userController, "userView"]);
$router->addRoute("POST", "/Admin", [$userController, "adminView"]);


$method = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['REQUEST_URI'];

$response = $router->dispatch($method, $path);
echo $response;