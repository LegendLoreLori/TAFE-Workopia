<?php
require '../helpers.php';
require basePath('Database.php');
// Run SaaS-LM-Challenges.test for now
require basePath('Router.php');

// Instantiating the router necessary to get routes
$router = new Router();
$routes = require basePath('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];
$router->route($uri, $method);