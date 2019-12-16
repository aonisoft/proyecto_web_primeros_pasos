<?php


class Kernel {

    private $router /*IRourter*/;
    private $vista /*IVista*/;
    private $tmpString; /*Hasta establecer una clase vista*/

   
    public function __construct()
    {
        $this-> router = Router::getRouter();
        $controlador = $this->router-> getControlador();
        $this-> tmpString = $controlador-> accionar($this->router->getEvento());
    }


    public function ejecutar(): void
    {
           echo($this->tmpString);
    }
}
