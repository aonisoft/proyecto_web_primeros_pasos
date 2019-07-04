<?php

interface Tabla{
    
    function select(): boolean;

    function getEntidad(int $id): Entidad;

    function getFirstEnt(): Entidad;

    function getLastEnt(): Entidad;

    function addEntidad(array $datos): boolean;
}
