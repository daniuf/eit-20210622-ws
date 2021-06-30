<?php

/** 
 * Script que obtiene informacion de un usuario
 * 
 */
define("TOKEN", "szzrdgfcvmnjkknjkjh888hgb");

if ($_SERVER['HTTP_TOKEN'] == TOKEN) {

// Siguiendo con el opcional, valido si no excedio el limite

 if (isset($_GET['id']) && empty($_GET['id']) == false) {

  $usuario = array('id' => $_GET['id'], 
		  'nombre' => 'Lionel', 
		  'apellido' => 'Messi');

  http_response_code(200);
  $json_output = json_encode($usuario);

 } else {

   http_response_code(400);
   $json_output = json_encode(array('error' => "Algunos de los parametros son incorrectos"));
 }
} else {

   http_response_code(401);
   $json_output = json_encode(array('error' => "Token invalido"));
}

 header("Content-Type: application/json");
 echo $json_output;
