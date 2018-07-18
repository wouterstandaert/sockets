<?php

// Load functionality
require_once './vendor/autoload.php';

// Create Router instance
$router = new \Bramus\Router\Router();

// Display the dashboard
$router->get('dashboard', '\App\Controllers\DashboardController@showDashboard');

// Set a fallback
$router->set404('\App\Controllers\DashboardController@showDashboard');

// Start your engine
$router->run();
die("done");