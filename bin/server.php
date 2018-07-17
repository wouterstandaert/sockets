<?php

require dirname(__DIR__) . '/vendor/autoload.php';

use App\Pusher;
use React\ZMQ\Context;
use Thruway\Peer\Router;
use Thruway\Transport\RatchetTransportProvider;

// Initialize routing
$router = new Router();

$loop = $router->getLoop();

$context = new Context($loop);
$pull = $context->getSocket(\ZMQ::SOCKET_PULL);
$pull->bind('tcp://127.0.0.1:5555');

$router->addTransportProvider(new RatchetTransportProvider('0.0.0.0', 7474));
$router->addInternalClient(new Pusher('default', $loop, $pull));

// Start routing
$router->start();