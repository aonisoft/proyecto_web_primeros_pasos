<?php

require_once "../nucleo/controladores/controlador.php";

class CInicio implements Controlador {

    
    public function accionar(Evento $ev=null): String
    {
        return  "<h1>Estoy desde el controlador</h1>";
    }

    public function archivo(): Archivo
    {
    }

    public function allJson(): Json
    {
    }

    public function dataJson(String $selector): Json
    {
    }
}
