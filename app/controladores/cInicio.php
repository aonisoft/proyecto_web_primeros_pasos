<?php

require_once "../nucleo/controladores/controlador.php";
require_once "../nucleo/iVista.php";
include_once "../app/models/articulo.php";
include_once "../vistas/site/index/index.php";


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
        //$ultimos = Articulos::listarUltimos();
        $articulos = Articulo::listar();
        //$lugares = Lugar::listar();

        $vista = new VIndex([
            'articulos' => $articulos,
        ]);
        
        return $vista;
    }

    public function contacto()
    {
      
    }
}
