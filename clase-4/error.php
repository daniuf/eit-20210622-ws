<?php

$json_output = json_encode(array('Error' => "Ha ocurrido un error. Por favor, revise su peticion"));

header("Content-Type: application/json");
echo $json_output;
