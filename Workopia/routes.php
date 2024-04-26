<?php

/* This is apparently possible due to being required in the index file
after the instantiation of a Router() object, but it gives me a bad code
smell. */
$router->get('/', 'HomeController@index');
//
//$router->get('/', 'controllers/home.php');
//$router->get('/listings', 'controllers/listings/index.php');
//$router->get('/listings/create', 'controllers/listings/create.php');
//$router->get('/listing', 'controllers/listings/show.php');

