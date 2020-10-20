<?php

// spl_autoload_register(function ($className) { //gère les require automatiquement
//     $path = str_replace("\\", "/", $className);
//     $path = str_replace("Inc", "classes", $className);
//     $path = $path . ".php";
//     if (file_exists($path)) require $path;
// });

// require('classes/Http/request.php');
// require('classes/Sql/request.php');

require('vendor/autoload.php'); //puis modifier composer.json "autoload" puis dans le terminal: composer dump-autoload

use Inc\Sql\Request as SqlRequest; // IL FAUT METTRE UN ALIAS SINON LE RISQUE C'EST QUE PHP PRENNE LE DERNIER ELEMENT DU NAMESPACE (ici Request)
use Inc\Http as H; // On peut mettre un alias sur un groupe de namespac

$http = new H\Request();

$sql = new SqlRequest();
