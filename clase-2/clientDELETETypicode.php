<?php

ini_set('date.timezone', 'America/Argentina/Buenos_Aires');

define("URL", "https://jsonplaceholder.typicode.com/posts/1");
define("ERROR_LOG", "logs/error.log");

$ch = curl_init();//curl handler

$url = URL;
curl_setopt($ch, CURLOPT_URL, $url);//1-URL adonde vamos a formular peticion
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");//2-Seteo metodo HTTP DELETE
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);//3-Forzamos devolucion a una variable

$respuesta = curl_exec($ch);

$http_status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

if ($http_status_code == 200) {

 if ($respuesta) {

   echo "Recurso eliminado exitosamente";

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


