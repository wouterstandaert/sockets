<?php

// Load functionality
require_once './vendor/autoload.php';

// Create Router instance
$router = new \Bramus\Router\Router();
// Set default namespace
$router->setNamespace('\App\Controllers');

// Handle authentication
$router->before('GET', '/.*', function () {
    // @todo: fix authentication
});

// Display the dashboard
$router->get('dashboard', 'DashboardController@showDashboard');

$router->mount('/users', function() use ($router) {

    // Get a list of users
    $router->get('/', 'UserController@getUsers');

    // Get a single user
    $router->get('/(\d+)', 'UserController@getUser');

});

// Set a fallback
$router->set404('\App\Controllers\DashboardController@showDashboard');

// Start your engine
$router->run();
die("done");