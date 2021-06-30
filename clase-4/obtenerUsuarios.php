<?php

/**
 * Creamos un listado de usuarios a retornar
 *
 */

 $usuarios = array(
		  array('Nombre' => 'Juan', 'Apellido' => 'Perez'),
		  array('Nombre' => 'Martin', 'Apellido' => 'Gonzalez'),
		);

 $afiliados = json_encode($usuarios);
 http_response_code(200);
 header("Content-Type: application/json");
 echo $afiliados;

