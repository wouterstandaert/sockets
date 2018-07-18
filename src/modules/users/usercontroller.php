<?php

namespace App\Controllers;

use App\PushHandler;

class UserController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }


    public function signIn()
    {
        $user = [
            'firstname' => 'Michel',
            'lastname' => 'Drets'
        ];

        // @todo: perform login

        PushHandler::send($user);
    }


    public function signOut()
    {
        // @todo: Finish up sign out functionality
    }


    public function getUsers()
    {
        // @todo: Finish up users functionality

        $users = [
            [
                'firstname' => 'Alain',
                'lastname' => 'Vandam'
            ],
            [
                'firstname' => 'Frankie',
                'lastname' => 'Loosveld'
            ]
        ];

        header('Content-Type: application/json');
        echo json_encode($users);
        exit();
    }


    public function getUser($userID)
    {
        // @todo: Make this dynamic
        $user = [
            'firstname' => 'John',
            'lastname' => 'Doe'
        ];

        header('Content-Type: application/json');
        echo json_encode($user);
        exit();
    }
}