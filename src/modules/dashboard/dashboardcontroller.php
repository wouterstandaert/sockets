<?php

namespace App\Controllers;

class DashboardController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }


    public function showDashboard()
    {
        $user = [
            'firstname' => 'John',
            'lastname' => 'Doe',
            'message' => 'Hello world!'
        ];

        header('Content-Type: application/json');
        echo json_encode($user);
        exit();
    }
}