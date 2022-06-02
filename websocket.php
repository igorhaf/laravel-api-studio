<?php

use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use App\Servidorsocket;

require './vendor/autoload.php';
$server = IoServer::factory(
    new HttpServer(
        new WsServer(
            new Servidorsocket()
        )
    ),
    8090
);

$server->run();
