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
            'lastname' => 'Doe'
        ];

        var_dump(json_encode($user));
        die();
    }
}