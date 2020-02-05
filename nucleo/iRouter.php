<?php

namespace nucleo;

use nucleo\controlador\Controlador;
use nucleo\controlador\Evento;

interface IRouter{

    function getControlador(): Controlador;

    function getEvento(): Evento;
}
