<?php

require_once "./app/controladores/cInicio.php";
require_once "./configuraciones/rutas.php";
require_once "./nucleo/router.php";
require_once "./nucleo/eventos/evento.php";


$ru =  Router::getRouter();

$ru -> setURL();


$contr = $ru->getControlador();

echo( $contr-> accionar());

