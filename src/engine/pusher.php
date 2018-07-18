<?php

namespace App;

use React\EventLoop\LoopInterface;
use React\ZMQ\SocketWrapper;
use Thruway\Peer\Client;

class Pusher extends Client
{
    protected $socket;


    public function __construct($realm, LoopInterface $loop, SocketWrapper $socket)
    {
        parent::__construct($realm, $loop);
        $this->socket = $socket;
    }


    public function onSessionStart($session, $transport)
    {
        $this->socket->on('message', [$this, 'transmit']);
    }


    public function transmit($payload)
    {
        // Decode the payload
        $payload = json_decode($payload);

        // @todo: make the topic name dynamic
        $this->getSession()->publish('chat', [ $payload ]);
    }
}