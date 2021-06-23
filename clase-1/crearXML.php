<?php

$xml = new simpleXMLElement("<libros></libros>");

$libros = array( 
		array('titulo' => "Harry Potter",
		      'anio_publicacion' => 2009,
 		      'isbn' => '2134567890987',
		      'autor' => "Rowling"),
		array('titulo' => "Harry Potter 2",
		      "anio_publicacion" => 2012,
		      "isbn" => "3456789",
		      "autor" => "Rowling"),
		array('titulo' => "Harry Potter 3",
		      "anio_publicacion" => 2015,
		      "isbn" => "345678956789",
		      "autor" => "Rowling")
		);

for ($i = 0; $i < count($libros); $i++) {

  $libro = $xml->addChild('libro');
  $libro->addChild('titulo', $libros[$i]['titulo']);
  $libro->addChild('anio_publicacion', $libros[$i]['anio_publicacion']);
  $libro->addAttribute('isbn', $libros[$i]['isbn']);
  $libro->addChild('autor', $libros[$i]['autor']);
}

header("Content-Type: text/xml");
echo $xml->asXML();
