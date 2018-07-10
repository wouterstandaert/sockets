<?php

namespace App;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;


class Intranet implements MessageComponentInterface
{
	/**
	 * The active connections
	 *
	 * @var array|null
	 */
	protected $clients;


	/**
	 * The connected users
	 *
	 * @var array|null
	 */
	protected $users;


	/**
	 * Handle a new connection
	 *
	 * @param ConnectionInterface $connection The current connection
	 */
	public function onOpen(ConnectionInterface $connection)
	{
		// Add a new user connection
		$this->clients[$connection->resourceId] = $connection;

		echo get_class($connection);

		echo "New user has connected: {$connection->resourceId}";
	}


	/**
	 * Process data
	 *
	 * @param ConnectionInterface $connection The current connection
	 * @param string $payload The received content
	 */
	public function onMessage(ConnectionInterface $connection, $payload)
	{
		$payload = json_decode($payload, true);

		$this->users[$connection->resourceId] = $payload['data']['user'];

		var_dump($this->users);
	}


	/**
	 * Close an active connection
	 *
	 * @param ConnectionInterface $connection The current connection
	 */
	public function onClose(ConnectionInterface $connection)
	{
		// Add a new user connection
		unset($this->clients[$connection->resourceId]);

		echo "New user has disconnected: {$connection->resourceId}";
	}


	/**
	 * Error handling
	 *
	 * @param ConnectionInterface $connection
	 * @param \Exception $e The occurred exception
	 */
	public function onError(ConnectionInterface $connection, \Exception $e)
	{
		echo "An error has occurred: {$e->getMessage()}\n";

		$connection->close();
	}
}