<?php

switch ($_SERVER['REQUEST_METHOD']) {

	case 'GET':
	  echo "Vino con GET";
	  break;
	case 'POST':
	  echo "Vino con POST";
	  break;
	case 'PUT':
	  echo "Vino con PUT";
	  break;
	case 'DELETE':
	  echo "Vino con DELETE";
	  break;
}
