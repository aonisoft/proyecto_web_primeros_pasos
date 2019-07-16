<?php

require_once "../nucleo/controladores/controlador.php";
require_once "../nucleo/iVista.php";
require_once "../models/Articulo.php";


class CInicio implements Controlador {

    private $param = null;    
    public function accionar(Evento $ev=null): IVista

    {
        $accion = $ev->getAccion();
        $this->param = $ev->getDatos();
       return  $this->$accion();
    }

    public function index()
    {
        $ultimos = Articulos::listarUltimos();
        $articulos = Articulos::listar();
        $lugares = Lugar::listar();

        $vista = new VIndex([
            'articulos' => $articulos,
            'lugares' => $lugares,
            'ultimos' => $ultimos
        ]);
        
        return $vista;
    }

    public function contacto()
    {
      
    }

   
}
