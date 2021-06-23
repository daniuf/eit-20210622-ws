<?php

//1-Ir a leer el XML
$xml = file_get_contents('http://api.daniuf.com.ar/clase-1/notas.xml');

if ($xml) {
  /**
  echo "<pre>";
  var_dump($xml);
  echo "</pre>";
  **/
  //2-Transformarlo en algo que pueda manipular desde PHP
  $data = simplexml_load_string($xml);

  if (is_object($data)) {
    /**echo "<pre>";
    var_dump($data);
    echo "</pre>";**/

    //3- (Opcional) Guardar informacion en Tabla de DB
    for ($i = 0; $i < count($data->nota); $i++) {
      echo "<h2>".$data->nota[$i]->titulo."</h2>";
      echo "<p>".$data->nota[$i]->de."</p>";
      echo "<p>".$data->nota[$i]->para."</p>";
      echo "<hr/>";
    }
  }

}
