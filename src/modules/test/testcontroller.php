<?php

namespace App\Controllers;

use App\PushHandler;

class TestController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }


    public function showTest()
    {
        PushHandler::send(array("test", "1", "2"));
    }

    public function postMessage()
    {
        $message = [
            'firstname' => $_POST['firstname'],
            'lastname' => $_POST['lastname'],
            'message' => $_POST['message']
        ];

        PushHandler::send($message);
    }
}