<?php

namespace app;

use nucleo\IRouter;
use nucleo\controlador\Controlador;
use nucleo\controlador\Evento;

class Router implements IRouter{

    private  $url /* array String */;
    private static $myRouter /* Router */;

    
    public static function getRouter(): Router
    {
        if(self::$myRouter == null)
            self::$myRouter =new Router();

        return self::$myRouter;
    }

    
    private function __construct(){}

    
    public function getControlador(): Controlador
    {
        $this->setURL();
        return $GLOBALS["control"][$this-> url[0]];        
    }

    
    public function getEvento(): Evento
    {
        $accion= (count($this->url)>1)? $this->url[2]: null;
        return new Evento($accion, $this-> getDatos());    
    }

    
    private function getDatos(): array
    {
        if($_POST)
            return  $_POST;
        
        if ($_GET)
            return !empty($this->uri[3]) ? $this->uri[3] : '';

        return [];
    }

    
    private function setURL(): void
    {
       $temp = substr($_SERVER['REQUEST_URI'], 1);
        
       $this-> url = explode('/', $temp);
    }

}
