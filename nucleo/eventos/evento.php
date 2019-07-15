<?php


class Evento
{

    private $datos /*array*/;

    private $accion /*String*/;

    public function __construct(String $acc = "", array $dat = [])
    {
        $this->datos = $dat;
        $this->accion = $acc;
        $this->datos['t_Metodo'] = $_SERVER['REQUEST_METHOD'];
    }


    public function getAccion(): String
    {
        return $this->accion;
    }

    public function getDatos(): array
    {
        return $this->datos;
    }
}
