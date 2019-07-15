<?php

class ExceptionEspecial{
    public static function estaSeteada($variable){
        if(!isset($variable)){
            throw new \Exception("La variable no está seteada");
        }
    }
}