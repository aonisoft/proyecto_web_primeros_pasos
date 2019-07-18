<?php


define('RUTAS', [
     "./nucleo/controladores/",
     "./nucleo/eventos/",
     "./nucleo/modelos/"
]);

define ('DOMINIO', "http://localhost:8020/");

define('EvNombres', [
    "iniciar" => "cambiar a"       
]);

static $inicio;
$inicio = new CInicio();


$GLOBALS["control"]= [
    "" => $inicio,
    //"inicio" => $inicio,
    //"home" => new CInicio()
    //"articulo" => new CArticulo()
];

$EVENTOS = [];
