<?php

/* This is apparently possible due to being required in the index file
after the instantiation of a Router() object, but it gives me a bad code
smell. */
$router->get('/', 'HomeController@index');
$router->get('/listings', 'ListingController@index');
$router->get('/listings/create', 'ListingController@create');
$router->get('/listing', 'ListingController@show');
