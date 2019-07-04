<?php


class Evento
{

    private $datos /*array*/;

    private $accion /*String*/;
    
    public function __construct(String $acc = "", array $dat = []) {
        $this-> datos = $dat;
        $this->accion = $acc;
    }
    
   
    public function getAccion(): String
    {
        
    }

    public function getDatos(): array
    {
        
    }
}
