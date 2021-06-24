<?php

ini_set('date.timezone', 'America/Argentina/Buenos_Aires');

define("URL", "https://api.estadisticasbcra.com/");
define("TOKEN", "BEARER eyJhbGciOiJIUzUxMiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE2NTYwMjMyMjMsInR5cGUiOiJleHRlcm5hbCIsInVzZXIiOiJkYW5pdWZAZ21haWwuY29tIn0.Q9vl1Wiu-FCW4XFCMCeJ9SNdHks0prllxqCqATxz87bXP40EYgzZgFmjbPG6sztFlrd8ghKfuYh9I1rqXTGvrw");
define("ERROR_LOG", "logs/error.log");

$ch = curl_init();//curl handler

$url = URL."usd_oficial";
curl_setopt($ch, CURLOPT_URL, $url);//1-URL adonde vamos a formular peticion
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");//2-Seteo metodo HTTP GET
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: '.TOKEN));//3-Envio en HEADER el TOKEN
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);//4-Forzamos devolucion a una variable

$json = curl_exec($ch);

$http_status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

//Opcional: Guardar en DB cada peticion

if ($http_status_code == 200) {
 if ($json) {

  $json_data = json_decode($json);
  $json_decode = json_last_error();

  if ($json_decode == 0) {
    //Pude decodificar el JSON correctamente
    //Instancia final: Hago lo que tengo que hacer con la info que obtuve
    for ($i = 0; $i < count($json_data); $i++) {
      echo "La cotizacion del dia ".$json_data[$i]->d. " fue de ".$json_data[$i]->v."<br/>";
    }
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


