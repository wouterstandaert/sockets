<?php

namespace MyApp;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;


class Intranet implements MessageComponentInterface
{
	/**
	 * The active intranet users
	 *
	 * @var
	 */
	protected $users;


	public function __construct()
	{
		$this->users = new \SplObjectStorage;
	}


	public function onOpen(ConnectionInterface $connection)
	{
		// Add a new user connection
		$this->users->attach($connection);

		echo "New user has connected: {$connection->resourceId}";
	}


	public function onMessage(ConnectionInterface $from, $message)
	{
		$numRecv = count($this->users) - 1;
		echo sprintf('Connection %d sending message "%s" to %d other connection%s' . "\n", $from->resourceId, $message, $numRecv, $numRecv == 1 ? '' : 's');

		foreach ($this->users as $user) {
			if ($from !== $user) {
				// The sender is not the receiver, send to each client connected
				$user->send($message);
			}
		}
	}


	public function onClose(ConnectionInterface $connection)
	{
		// Add a new user connection
		$this->users->detach($connection);

		echo "New user has disconnected: {$connection->resourceId}";
	}


	public function onError(ConnectionInterface $connection, \Exception $e)
	{
		echo "An error has occurred: {$e->getMessage()}\n";

		$connection->close();
	}
}