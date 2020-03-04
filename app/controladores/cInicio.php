<?php

namespace app\controlador;

use modelo\Crud;
use nucleo\controlador\Controlador;
use nucleo\controlador\Evento;
use \Json;
use modelo\Condicion;

class CInicio implements Controlador {

    
    public function accionar(Evento $ev=null): String
    {
        $prueba_crud = new Crud("articulo");
        return  "<h1>Estoy desde el controlador</h1>";
    }

    public function allJson(): Json
    {
    }

    public function dataJson(String $selector): Json
    {
    }
}
