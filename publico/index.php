<?php

require_once "../app/controladores/cInicio.php";
require_once "../configuraciones/rutas.php";
require_once "../nucleo/router.php";
require_once "../nucleo/eventos/evento.php";
require_once "../nucleo/autoload.php";

$ru =  Router::getRouter();

$ru -> setURL();


$contr = $ru->getControlador();
$evento = $ru->getEvento();
//print_r ($contr);
$vista = ( $contr-> accionar($evento));

echo $vista->mostrar();

