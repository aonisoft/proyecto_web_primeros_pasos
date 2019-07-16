<?php

require_once "../nucleo/eventos/evento.php";
require_once "../nucleo/controladores/controlador.php";
require_once "../nucleo/iRouter.php";


class Router implements IRouter{

    private  $url /* array String */;
    private static $myRouter /* Router */;

    
    public static function getRouter(): Router
    {
        if(self::$myRouter == null)
            self::$myRouter =new Router();
               
        return self::$myRouter;
    }

    
    private function __construct(){
    }

    
    public function getControlador(): Controlador
    {           
        return $GLOBALS["control"][$this-> url[0]];
    }

    
    public function getEvento(): Evento
    {
        return new Evento($this->url[2], $this-> getDatos());    
    }

    
    private function getDatos(): array
    {
        if(REQUEST_METHOD === 'POST')
            return  $_POST;
        
        if (REQUEST_METHOD === 'GET')
            return !empty($this->uri[3]) ? $this->uri[3] : '';

        return [];
    }

    
    public function setURL(): void
    {
        $temp = substr($_SERVER['REQUEST_URI'], 1);
        
        $this-> url = explode('/', $temp);
        
    }

}
