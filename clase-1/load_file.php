<?php

define("FILENAME", "notas.xml!");

if (file_exists(FILENAME)) {
  $xml = simplexml_load_file(FILENAME);

  if (is_object($xml)) {

    var_dump($xml);
    //2- Parsear XML y almacenar informacion en DB

  } else {

    echo "No pude abrir el XML";
  }
} else {
  echo "Error. No existe el archivo ".FILENAME;
}
