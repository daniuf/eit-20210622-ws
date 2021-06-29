<?php

define("URL", "http://www.thomas-bayer.com/axis2/services/BLZService");
define("WSDL", URL."?wsdl");

$options = array('soap_version' => SOAP_1_1,
		 'trace' => true);

try {
  $soap_client = new SoapClient(WSDL, $options);//Convierto en objeto el WSDL

  //1er opcion de implementacion
  $input['blz'] = $_GET['blz'];
  $response = $soap_client->getBank($input);

  //2da opcion de implementacion
  //$response = $soap_client->getBank(array('blz' => "54030011"));
  //echo "bezeichnung: ".$response->details->bezeichnung."<br/>";

  //3ra opcion de implementacion
  //$response = $soap_client->__soapCall("getBank", array('getBank'
  //						 => array('blz' => "54030011")));

  echo "<pre>";
  var_dump($response);
  echo "</pre>";

  echo $soap_client->__getLastRequestHeaders()."<br/>";
  echo $soap_client->__getLastRequest()."<br/>";
  echo $soap_client->__getLastResponseHeaders()."<br/>";
  echo $soap_client->__getLastResponse()."<br/>";

} catch (Exception $e) {

  print "Error: ".$e->getMessage();
}


