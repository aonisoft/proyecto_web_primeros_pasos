<?php

use nucleo\Fabrica;
use app\controlador\CInicio;

define('RUTAS', [
     "./nucleo/controladores/",
     "./nucleo/eventos/",
     "./nucleo/modelos/"
]);

define ('DOMINIO', "http://localhost:8020/");

define('EvNombres', [
    "iniciar" => "cambiar a"       
]);


$santos = ['engine'  => "mysql",
           'dBase'   => "yourstyle",
           'host'    => "localhost",
           'user'    => "santos_web",
           'pass'    => "1234"];

Fabrica::addDatos("santos", $santos);

static $inicio;
$inicio = new CInicio();


$GLOBALS["control"]= [
    "" => $inicio,
    "inicio" => $inicio,
    "home" => new CInicio()
];

$EVENTOS = [];
