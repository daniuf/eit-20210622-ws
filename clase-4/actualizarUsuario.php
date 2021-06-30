<?php
/**
 * Script que recibe por PUT para actualizar un usuario
 *
 */

 if (isset($_GET['id']) && empty($_GET['id']) == false) {

   $json_input = json_decode(file_get_contents('php://input'));

   if ($json_input->nombre) {

     http_response_code(200);
     $json_output = json_encode(array('id' => $_GET['id']));
   } else {
   
     http_response_code(400);
     $json_output = json_encode(array('error' => 'Error'));
   }
 } else {
  
   http_response_code(404);
   $json_output = json_encode(array('error' => "Usuario no encontrado"));

 }

 header("Content-Type: application/json");
 echo $json_output;
