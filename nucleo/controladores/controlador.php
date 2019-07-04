<?php
    
interface Controlador {
    
    function accionar(Evento $ev): String;

    function archivo(): Archivo;

    function allJson(): Json;

    function dataJson(String $dato): Json;
}


