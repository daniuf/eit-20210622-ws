<?php

//1-Ir a leer el XML
$xml = file_get_contents('http://api.daniuf.com.ar/clase-1/notas.xml');

if ($xml) {
  //2-Transformarlo en algo que pueda manipular desde PHP
  $data = simplexml_load_string($xml);

  if (is_object($data)) {
    //3- (Opcional) Guardar informacion en Tabla de DB
    for ($i = 0; $i < count($data->nota); $i++) {
     //Si tenemos un unico atributo podemos hacer lo siguiente
     $emailDe = $data->nota[$i]->de->attributes();
     foreach ($emailDe as $value) {
       $email = $value;
     }
     /**
     //Si tenemos mas de un atributo dentro del mismo elemento
     foreach ($emailDe as $key => $value) {
       $$key=$value;
     //$email=tove@gmail.com
     }
     $email
     **/
      echo "<h2>".$data->nota[$i]->titulo."</h2>";
      echo "<p> De: ".$data->nota[$i]->de." ($email)</p>";
      echo "<p>".$data->nota[$i]->para."</p>";
      echo "<hr/>";
    }
  }
}
