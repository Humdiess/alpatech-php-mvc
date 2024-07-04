<?php

// Routes.php

$routes = [];

$routes['/'] = 'WelcomeController@index';
// Contoh rute untuk AuthorController
$routes['author/index'] = 'AuthorController@index';
$routes['author/add'] = 'AuthorController@add';
$routes['author/edit/(:num)'] = 'AuthorController@edit/$1';
$routes['author/update'] = 'AuthorController@update';
$routes['author/delete/(:num)'] = 'AuthorController@delete/$1';
$routes['author/detail/(:num)'] = 'AuthorController@detail/$1';

// Penanganan 404
$routes['404'] = 'ErrorController@notFound';
