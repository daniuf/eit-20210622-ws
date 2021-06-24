<?php

ini_set('date.timezone', 'America/Argentina/Buenos_Aires');

define("URL", "https://jsonplaceholder.typicode.com/posts/1");
define("ERROR_LOG", "logs/error.log");

$ch = curl_init();//curl handler

$url = URL;

$json_input = array("title" => "Titulo de prueba actualizado",
		    "body" => "Descripcion",
		    "userId" => 1,
		    "id" => 1);

$json_input_encode = json_encode($json_input);

curl_setopt($ch, CURLOPT_URL, $url);//1-URL adonde vamos a formular peticion
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");//2-Seteo metodo HTTP PUT
curl_setopt($ch, CURLOPT_POSTFIELDS, $json_input_encode);//3-Enviamos el JSON en el cuerpo de la peticion
curl_setopt($ch, CURLOPT_HTTPHEADER, "'Content-type': 'application/json; charset=UTF-8'");//4-Indico en el header que lo que envio es un JSON
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);//5-Forzamos devolucion a una variable

$json = curl_exec($ch);

$http_status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

if ($http_status_code == 200) {
 if ($json) {

  $json_data = json_decode($json);
  $json_decode = json_last_error();

  if ($json_decode == 0) {
	var_dump($json_data);
  } else {
    //Ocurrio un error con la respuesta. No es un JSON valido.
    loguear("a+", ERROR_LOG, "Ocurrio el siguiente error con el JSON decode".json_last_error_msg());
  }

 } else {
  loguear("a+", ERROR_LOG, "Ocurrio un error. Error de curl: ".curl_error($ch));
 }
} else {
  loguear("a+", ERROR_LOG, "Ocurrio un error. HTTP Status Code: ".$http_status_code."|URL: ".$url);
}

curl_close($ch);

function loguear($modo, $nombre_archivo, $mensaje) {

  $date = new DateTime();
  $datetime = $date->format('Y-m-d H:i:s');

  $fp = fopen($nombre_archivo, $modo);
  fwrite($fp, "[".$datetime."]\t".$mensaje.PHP_EOL);
  fclose($fp);
}


