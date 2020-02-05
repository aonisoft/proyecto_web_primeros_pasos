<?php

namespace app\controlador;

use modelo\Crud;
use nucleo\controlador\Controlador;
use nucleo\controlador\Evento;
use \Json;
use modelo\Condicion;

function showArray(array $elements): void 
{
    foreach($elements as $elem)
    {
        echo("  ". $elem );
    }
}

class CInicio implements Controlador {

    
    public function accionar(Evento $ev=null): String
    {
        $prueba_crud = new Crud("articulo");
        // var_dump( Fabrica::getConexion("santos")->query("show columdns from articulo")->fetchAll());
        showArray($prueba_crud-> recuperar(new Condicion("precio",">","120"),"asd", "100"));
        return  "<h1>Estoy desde el controlador</h1>";
    }

    public function allJson(): Json
    {
    }

    public function dataJson(String $selector): Json
    {
    }
}
