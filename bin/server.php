<?php

use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use MyApp\Intranet;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$server = IoServer::factory(
	new HttpServer(
		new WsServer(
			new Intranet()
		)
	),
	8080
);

$server->run();