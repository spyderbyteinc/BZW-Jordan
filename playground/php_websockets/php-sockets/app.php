<?php

use Ratchet\Server\IoServer;
use Ratchet\Http\httperver;
use Ratchet\WebSocket\WsServer;
use MyApp\Socket;

require dirname( __FILE__ ) . '/vendor/autoload.php';

$server = IoServer::factory(
    new httperver(
        new WsServer(
            new Socket()
        )
    ),
    8080
);

$server->run();