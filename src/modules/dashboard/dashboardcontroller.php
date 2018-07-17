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
        var_dump("Show dashboard");
    }
}