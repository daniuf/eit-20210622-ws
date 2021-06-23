<?php

define("URL_WS", "http://www.geoplugin.net/xml.gp");

$ip_cliente = $_SERVER['REMOTE_ADDR'];

$informacion = file_get_contents(URL_WS."?ip=".$ip_cliente);

if ($informacion) {

  $data = simplexml_load_string($informacion);
  /*
  echo "<pre>";
  var_dump($data);
  echo "</pre>";
  */

  echo "Gracias por visitarnos desde ".$data->geoplugin_city.", ".$data->geoplugin_countryName;

} else {

  echo "Error al leer XML del WebService";
}
