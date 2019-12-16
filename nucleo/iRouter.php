<?php

interface IRouter{

    function getControlador(): Controlador;

    function getEvento(): Evento;
}
