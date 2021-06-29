<?php

class Servidor {

  public function __construct() {}

  public function holaMundo() {
    return "Hola mundo";
  }

  public function saludar($mensaje) {
    return "El WS te saluda ".$mensaje;
  }

  public function sumar($a, $b) {
    $suma = $a + $b;
    return $suma;
  }

  public function consultarUsuarios() {
    //Conectarse a DB
    //Obtener usuarios
  }
}

$options = array('uri' => 'http://api.daniuf.com.ar/clase-3/servidor.php');

$soapserver = new SoapServer(null, $options);
$soapserver->setClass('Servidor');
$soapserver->handle();

