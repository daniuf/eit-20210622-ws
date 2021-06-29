<?php

$ch = curl_init();//curl handler

$url = "http://www.thomas-bayer.com/axis2/services/BLZService";

$blz = $_GET['blz'];

$xml = '<?xml version="1.0" encoding="UTF-8"?>
<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ns1="http://thomas-bayer.com/blz/"><SOAP-ENV:Body><ns1:getBank><ns1:blz>'.$blz.'</ns1:blz></ns1:getBank></SOAP-ENV:Body></SOAP-ENV:Envelope>';

$headers = array('Content-Type: text/xml; charset=utf-8', 'SOAPAction: ""');

curl_setopt($ch, CURLOPT_URL, $url);//1-URL adonde vamos a formular peticion
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");//2-Seteo metodo HTTP POST
curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);//3-Enviamos el XML
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);//4-Enviamos HTTP Headers
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);//5-Forzamos devolucion a una variable

$xml = curl_exec($ch);

if ($xml) {
  var_dump($xml);
}

curl_close($ch);

