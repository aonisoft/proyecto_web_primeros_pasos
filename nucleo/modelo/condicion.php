<?php

namespace modelo;

use function utiles\comunes\toArrayString;
use function  utiles\comunes\str_space;
use Closure;


class Condicion {

    private array $condicion = [];

    public static function getBetween(String $col, String $ini, String $fin): Condicion
    {
        return (new Condicion())->init($col, KWSQL["bt"], $ini . str_space(KWSQL['and']) . $fin);
    }

    public static function getLike(String $col, String $patron) : Condicion
    {
        return (new Condicion)->init($col, KWSQL["like"], $patron);
    }
    
    public function init(String $key="", String $ope="", String $val=""): Condicion
    {
        $this->unir($key, $ope, $val)("");   
        return $this;
    }

    private function unir (String $key, String $ope, String $val) : Closure
    {
        return function (String $opeLogico) use ($key, $ope, $val) : void
        {
            if($this->isValido($key, $ope, $val))
            {
                $this->condicion[] = $opeLogico;
                
                $this->condicion[] = $key . str_space( $ope) . $val;
            }
        };
    }

    private function unirCond(Condicion $cond): Closure
    {
        return function(String $opeLogico) use ($cond): void
        {
            if($cond->hadCond())
            {
                $this->condicion[] = $opeLogico;
                
                $this->condicion[] = "(";
                $this->condicion = array_merge($this->condicion, $cond->getArray());
                $this->condicion[] = ")";
            }
        };
    }

    private function isValido (String $key, String $ope, String $val): bool
    {
        return !($key === "" or $ope === "" or $val === "");
    }

    public function and(String $clave, String $operador, String $valor): Condicion
    {
        if($this->hadCond())
            $this->unir($clave, $operador, $valor)(KWSQL['and']);
        
        return $this;
    }

    public function or(String $clave, String $operador, String $valor): Condicion
    {
        if($this->hadCond())
           $this->unir($clave, $operador, $valor)(KWSQL['or']);
        
        return $this;
    }

    public function not(String $clave, String $operador, String $valor): Condicion 
    {
        $this->unir("(".$clave, $operador, $valor.")")(KWSQL['not']);

        return $this;
    }

    public function andCondicion(Condicion $andCond): Condicion
    {       
        $this->unirCond($andCond)(KWSQL['and']);

        return $this;
    }

    public function orCondicion(Condicion $orCond): Condicion
    {
        $this->unirCond($orCond)(KWSQL['or']);

        return $this;
    }

    public function notCondicion(Condicion $notCond): Condicion
    {
        $this->unirCond($notCond)(KWSQL['not']);

        return $this;
    }

    public function get(): String
    {
        return toArrayString($this->condicion);

    }

    public function getArray(): array
    {
        return $this->condicion;        
    }

    public function hadCond(): bool
    {
        return !($this->condicion == []);
    }
}

