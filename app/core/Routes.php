<?php

// Routes
$routes = [];

// authors
$routes['GET:/author'] = 'AuthorController@index';
$routes['GET:/author/test'] = 'AuthorController@test';
$routes['GET:/author/add'] = 'AuthorController@add';
$routes['POST:/author/save'] = 'AuthorController@save';
$routes['GET:/author/edit/{id}'] = 'AuthorController@edit';
$routes['POST:/author/update'] = 'AuthorController@update';
$routes['GET:/author/detail/{id}'] = 'AuthorController@detail';
$routes['POST:/author/delete/{id}'] = 'AuthorController@delete';

// publishers
$routes['GET:/publisher'] = 'PublisherController@index';
$routes['GET:/publisher/add'] = 'PublisherController@add';
$routes['POST:/publisher/save'] = 'PublisherController@save';
$routes['GET:/publisher/edit/{id}'] = 'PublisherController@edit';
$routes['POST:/publisher/update'] = 'PublisherController@update';
$routes['GET:/publisher/detail/{id}'] = 'PublisherController@detail';
$routes['POST:/publisher/delete/{id}'] = 'PublisherController@delete';

// book
$routes['GET:/book'] = 'BookController@index';
$routes['GET:/book/add'] = 'BookController@add';
$routes['POST:/book/save'] = 'BookController@save';
$routes['GET:/book/edit/{id}'] = 'BookController@edit';
$routes['POST:/book/update'] = 'BookController@update';
$routes['GET:/book/detail/{id}'] = 'BookController@detail';
$routes['POST:/book/delete/{id}'] = 'BookController@delete';

