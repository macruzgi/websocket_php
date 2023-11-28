<?php
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;

use Websocket\Socket;

require dirname( __FILE__ ).'/vendor/autoload.php';

//instanciamos y creamos el servidor socket
$server = IoServer::factory(
			new HttpServer(
				new WsServer(
					new Socket()
				)
			),
			8080 //puerto de escucha puede ser otro que no este utilizado en el host
		);
//iniciamos el server
$server->run();