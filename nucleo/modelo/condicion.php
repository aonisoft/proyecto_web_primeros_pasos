<?php

class Condicion {

    private $valor /*String*/;
    private $clave /*String*/;
    private $and /*Condicion*/;
    private $or /*Condicion*/;


    public function and(Condicion $and): Condicion
    {
    }

    public function or(Condicion $or): Condicion
    {
    }

    public function get(): String
    {
    }
}
