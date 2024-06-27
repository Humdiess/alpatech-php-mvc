<?php

return [
    // Routes for buku
    [
        "url" => "/",
        "name" => "index",
        'controller' => \Controllers\BukuController::class,
        'method' => 'index'
    ],
    [
        "url" => "/buku",
        "name" => "buku_index",
        'controller' => \Controllers\BukuController::class,
        'method' => 'index'
    ],
    [
        "url" => "/buku/create",
        "name" => "buku_create",
        'controller' => \Controllers\BukuController::class,
        'method' => 'create'
    ],
    [
        "url" => "/buku/store",
        "name" => "buku_store",
        'controller' => \Controllers\BukuController::class,
        'method' => 'store'
    ],
    [
        "url" => "/buku/edit/{id}",
        "name" => "buku_edit",
        'controller' => \Controllers\BukuController::class,
        'method' => 'edit'
    ],
    [
        "url" => "/buku/update/{id}",
        "name" => "buku_update",
        'controller' => \Controllers\BukuController::class,
        'method' => 'update'
    ],
    [
        "url" => "/buku/delete/{id}",
        "name" => "buku_delete",
        'controller' => \Controllers\BukuController::class,
        'method' => 'delete'
    ],
    // Routes for author
    [
        "url" => "/author",
        "name" => "author_index",
        'controller' => \Controllers\AuthorController::class,
        'method' => 'index'
    ],
    [
        "url" => "/author/create",
        "name" => "author_create",
        'controller' => \Controllers\AuthorController::class,
        'method' => 'create'
    ],
    [
        "url" => "/author/store",
        "name" => "author_store",
        'controller' => \Controllers\AuthorController::class,
        'method' => 'store'
    ],
    [
        "url" => "/author/edit/{id}",
        "name" => "author_edit",
        'controller' => \Controllers\AuthorController::class,
        'method' => 'edit'
    ],
    [
        "url" => "/author/update/{id}",
        "name" => "author_update",
        'controller' => \Controllers\AuthorController::class,
        'method' => 'update'
    ],
    [
        "url" => "/author/delete/{id}",
        "name" => "author_delete",
        'controller' => \Controllers\AuthorController::class,
        'method' => 'delete'
    ],
    // Routes for publisher
    [
        "url" => "/publisher",
        "name" => "publisher_index",
        'controller' => \Controllers\PublisherController::class,
        'method' => 'index'
    ],
    [
        "url" => "/publisher/create",
        "name" => "publisher_create",
        'controller' => \Controllers\PublisherController::class,
        'method' => 'create'
    ],
    [
        "url" => "/publisher/store",
        "name" => "publisher_store",
        'controller' => \Controllers\PublisherController::class,
        'method' => 'store'
    ],
    [
        "url" => "/publisher/edit/{id}",
        "name" => "publisher_edit",
        'controller' => \Controllers\PublisherController::class,
        'method' => 'edit'
    ],
    [
        "url" => "/publisher/update/{id}",
        "name" => "publisher_update",
        'controller' => \Controllers\PublisherController::class,
        'method' => 'update'
    ],
    [
        "url" => "/publisher/delete/{id}",
        "name" => "publisher_delete",
        'controller' => \Controllers\PublisherController::class,
        'method' => 'delete'
    ]
];
