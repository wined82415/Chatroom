<?php
namespace Chatroom;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class Chat implements MessageComponentInterface
{
    protected $clients;

    public function __construct()
    {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn)
    {
        $this->clients->attach($conn);

//        echo "New connection! ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg)
    {
        $numRecv = count($this->clients) - 1;

        foreach ($this->clients as $client) {
//            if ($from == $client) {
                $client->send($from->resourceId . ' said: ' . $msg);
//            }
        }
        // $client->send('喵');
    }

    public function onClose(ConnectionInterface $conn)
    {
        $this->clients->detach($conn);

//        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        $conn->close();
    }
}
