<?php

define("SOAP_SERVER", "http://api.daniuf.com.ar/clase-3/servidor.php");

try {

  $options = array( 
		'location' => SOAP_SERVER,
		'uri' => SOAP_SERVER,
		'trace' => true
		);

  $client = new SoapClient(null, $options);
  //$respuesta = $client->__soapCall("holaMundo", ['holaMundo' => '']);
  //$respuesta = $client->__soapCall("saludar", ['saludar' => 'Hola mundo!']);
  $respuesta = $client->__soapCall("sumar", array(1,3));
  //$respuesta = $client->holaMundo();

  echo "El WS respondio: ".$respuesta."<br/>"; 
  echo "<hr/>";

  /**
  echo $client->__getLastRequestHeaders()."<br/>";
  echo $client->__getLastRequest()."<br/>";
  echo $client->__getLastResponseHeaders()."<br/>";
  echo $client->__getLastResponse()."<br/>";
  */

} catch (Exception $e) {
  echo "Error: ".$e->getMessage();
}
