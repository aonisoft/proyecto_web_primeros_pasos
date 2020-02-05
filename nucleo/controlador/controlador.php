<?php

namespace nucleo\controlador;
use nucleo\controlador\Evento;
use \Json;

interface Controlador {
    
    function accionar(Evento $ev): String;

    function allJson(): Json;

    function dataJson(String $dato): Json;
}


