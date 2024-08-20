<?php

require 'Router.php';
require 'UserController.php';
require 'MediumController.php';

use Webapp\src\Controller\UserController;
use Webapp\src\Controller\MediumController;
use Webapp\src\Routing\Router;

// DB connection

$router = new Router();
$userController = new UserController;
$mediumController = new MediumController;

$router->addRoute("POST",  "/LandingPage", [$userController, "landingPageView"]);
$router->addRoute("POST", "/Login", [$userController, "loginView"]);
$router->addRoute("POST", "/User", [$userController, "logout"]);
$router->addRoute("POST", "/Admin", [$userController, "adminView"]);

$router->addRoute("DELETE", "/USER", [$mediumController, "deleteMedium"]);
$router->addRoute("DELETE", "/ADMIN", [$userController, "deleteUser"]); //not a requirement, implementation for testing purposes

$router->addRoute("PUT", "/USER", [$mediumController, "updateMedium"]);
$router->addRoute("PUT", "/USER", [$mediumController, "uploadMedium"]);
$router->addRoute("PUT", "/ADMIN", [$mediumController, "updateKeywords"]);
$router->addRoute("PUT", "/ADMIN", [$userController, "updateUser"]); //not a requirement, implementation for testing purposes

$method = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['REQUEST_URI'];

$response = $router->dispatch($method, $path);
echo $response;

?>

