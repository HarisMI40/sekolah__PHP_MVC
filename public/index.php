<?php
require_once __DIR__ . "/../vendor/autoload.php";

use Rpl\Mvc\App\Router;
use Rpl\Mvc\Controller\HomeController;

Router::add('GET', '/register', "RegisterController", "register");
Router::add('GET', '/home', HomeController::class, "index");


Router::run();