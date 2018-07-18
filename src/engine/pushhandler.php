<?php

namespace App;

class PushHandler
{
    /**
     * The active socket connection
     *
     * @var \ZMQSocket
     */
    private static $socket;


    /**
     * Initialize our push controller
     */
    private static function init()
    {
        if (!isset(self::$socket))
        {
            $context = new \ZMQContext();

            self::$socket = $context->getSocket(\ZMQ::SOCKET_PUSH);

            self::$socket->connect('tcp://127.0.0.1:5555');
        }
    }


    /**
     * Send some content to our socket
     *
     * @param mixed $payload The content you want to the websocket
     */
    public static function send($payload)
    {
        // JSON encode the data because only string data can be sent
        $payload = json_encode($payload);
        // Send the data to the socket
        self::getSocket()->send($payload);
    }


    /**
     * Get the active socket
     *
     * @return \ZMQSocket
     */
    private static function getSocket()
    {
        self::init();

        return self::$socket;
    }
}