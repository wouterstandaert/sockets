<?php

namespace App\Controllers;

use App\PushHandler;

class TestController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function postMessage()
    {
        $message = "Hello world";

        PushHandler::send($message);
    }
}