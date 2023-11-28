<?php
namespace Websocket;
//espacios de nombres para usar la clase de Racchet que permite el uso de socket en php
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class Socket implements MessageComponentInterface{
	public function __construct(){
		$this->cliente = new \SplObjectStorage;
	}
	//funcion que abre la conexion y mostrara un mesaje en cosola cada vez se abra la conexion, no es oblicacion mostrar el texto
	public function onOpen(ConnectionInterface $conn){
		$this->cliente->attach($conn);
		echo "Nueva conexión ({$conn->resourceId})\n";
	}
	//funcion que se activara cuando el cliente envie un mensaje, el mensaje sera recibido en la variable $msj
	public function onMessage(ConnectionInterface $from, $msj){
		foreach($this->cliente as $el_cliente){
			if($from->resourceId == $el_cliente->resourceId){
				continue;
			}
			$el_cliente->send($msj);
		}
	}
	public function onClose(ConnectionInterface $conn){
		
	}
	public function onError(ConnectionInterface $conn, \Exception $e){
		
	}
}