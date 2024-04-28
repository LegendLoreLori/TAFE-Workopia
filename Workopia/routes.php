<?php

/* This is apparently possible due to being required in the index file
after the instantiation of a Router() object, but it gives me a bad code
smell. */
/* Listings routes */
$router->get('/', 'HomeController@index');
$router->get('/listings', 'ListingController@index');
$router->get('/listings/create', 'ListingController@create');
$router->get('/listings/edit/{id}', 'ListingController@edit');
$router->get('/listings/{id}', 'ListingController@show');

$router->post('/listings', 'ListingController@store');
$router->put('/listings/{id}', 'ListingController@update');
$router->delete('/listings/{id}', 'ListingController@destroy');

/* Users routes */
$router->get('/auth/register', 'UserController@create');
$router->get('/auth/login', 'UserController@login');