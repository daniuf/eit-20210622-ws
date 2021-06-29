<?php

define("URL", "https://ecs.syr.edu/faculty/fawcett/Handouts/cse775/code/calcWebService/Calc.asmx");
define("WSDL", URL."?wsdl");

try {

 $options = array('trace' => true);

 $soap_client = new SoapClient(WSDL, $options);

 /**
  * Operaciones disponibles: 1-Add / 2-Substract
 */
 //3 y 5
 $a = $_GET['a'];
 $b = $_GET['b'];

 $resultado = $soap_client->Add(['a' => $a, 'b' => $b]);
 echo "La suma de $a y $b es: $resultado->AddResult<br/>"; 

 /**
 echo "<pre>";
 var_dump($resultado);
 echo "</pre>";
 **/

  /**
  echo $soap_client->__getLastRequestHeaders()."<br/>";
  echo $soap_client->__getLastRequest()."<br/>";
  echo $soap_client->__getLastResponseHeaders()."<br/>";
  echo $soap_client->__getLastResponse()."<br/>";
  **/

} catch (Exception $e) {

  echo "Error: ".$e->getMessage();
}
