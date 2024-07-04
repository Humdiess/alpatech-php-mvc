<?php

// Routes
$routes = [];

// authors
$routes['/author'] = 'AuthorController@index';
$routes['/author/test'] = 'AuthorController@test';
$routes['/author/add'] = 'AuthorController@add';
$routes['/author/save'] = 'AuthorController@save';
$routes['/author/edit/{id}'] = 'AuthorController@edit';
$routes['/author/update'] = 'AuthorController@update';
$routes['/author/detail/{id}'] = 'AuthorController@detail';
$routes['/author/delete/{id}'] = 'AuthorController@delete';

// publishers
$routes['/publisher'] = 'PublisherController@index';
$routes['/publisher/add'] = 'PublisherController@add';
$routes['/publisher/save'] = 'PublisherController@save';
$routes['/publisher/edit/{id}'] = 'PublisherController@edit';
$routes['/publisher/update'] = 'PublisherController@update';
$routes['/publisher/detail/{id}'] = 'PublisherController@detail';
$routes['/publisher/delete/{id}'] = 'PublisherController@delete';

// book
$routes['/book'] = 'BookController@index';
$routes['/book/add'] = 'BookController@add';
$routes['/book/save'] = 'BookController@save';
$routes['/book/edit/{id}'] = 'BookController@edit';
$routes['/book/update'] = 'BookController@update';
$routes['/book/detail/{id}'] = 'BookController@detail';
$routes['/book/delete/{id}'] = 'BookController@delete';
