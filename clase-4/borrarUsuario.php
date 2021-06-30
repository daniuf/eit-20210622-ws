<?php

/**
 * Script que recibe por DELETE para eliminar un usuario
 *
 */

 if (isset($_GET['id']) && empty($_GET['id']) == false) {

   http_response_code(200);
   $json_output = json_encode(array('id' => $_GET['id']));

 } else {
  
   http_response_code(404);
   $json_output = json_encode(array('error' => "Usuario no encontrado"));

 }

 header("Content-Type: application/json");
 echo $json_output;
