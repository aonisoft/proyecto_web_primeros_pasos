<?php
namespace nucleo;

use modelo\Crud;
use app\Router;

class Kernel {

    private IRouter $router ;
    private IVista $vista ;
    private String $tmpString; /*Hasta establecer una clase vista*/

   
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
