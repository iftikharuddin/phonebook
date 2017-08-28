<?php

$router = $di->getRouter();

// Define your routes here

// Define a route

// Routes for API

// For Accessing one record
$router->add(
    '/api/contacts/{id}',
    [
        'controller' => 'Api',
        'action'     => 'contact',
    ]
);

// For deleting one record
$router->add(
    '/api/contacts/delete/{id}',
    [
        'controller' => 'Api',
        'action'     => 'deleteContact',
    ]
);

$router->handle();
