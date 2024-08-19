<?php

require 'vendor/autoload.php';

use Webapp\Controller\UserController;
use Webapp\Repository\UserRepository;
use Webapp\Router;
use PDO;

// DB connection

$router = new Router();

//Create Routes