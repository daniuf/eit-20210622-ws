<?php

/**
 * Script que recibe por POST para crear un usuario
 *
 */

 //1- Recibir el JSON
 $input_json = json_decode(file_get_contents('php://input'));

 if ($input_json->nombre != "" && $input_json->apellido != "") {//Voy a crear el recurso

   http_response_code(201);
   $json_output = json_encode(array('id' => uniqid()));

 } else {
  
   http_response_code(400);
   $json_output = json_encode(array('error' => "Algunos de los parametros son incorrectos"));

 }

 header("Content-Type: application/json");
 echo $json_output;
