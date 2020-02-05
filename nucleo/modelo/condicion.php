<?php

namespace modelo;

use function modelo\utiles\toArrayString as toArrayString;
use Closure;

class Condicion {

    private array $condicion = [];

    public static function getBetween(String $col, String $ini, String $fin): Condicion
    {
        return new Condicion("( ". $col, "between", $ini . " and ". $fin . " )");
    }

    public static function getLike(String $col, String $patron) : Condicion
    {
        return new Condicion($col, "like", $patron);
    }
    
    public function __construct(String $key="", String $ope="", String $val="")
    {
        $this->unir($key, $ope, $val)("");        
    }

    private function unir (String $key, String $ope, String $val) : Closure
    {
        return function (String $opeLogico) use ($key, $ope, $val) : void
        {
            if($this->isValido($key, $ope, $val))
            {
                $this->condicion[] = $opeLogico;
                
                $this->condicion[] = $key ." ". $ope ." " . $val;
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

    public function and(String $clave, String $operador, String $valor): void
    {
        if($this->hadCond())
            $this->unir($clave, $operador, $valor)("and");
    }

    public function or(String $clave, String $operador, String $valor): void
    {
        if($this->hadCond())
           $this->unir($clave, $operador, $valor)("or");
    }

    public function not(String $clave, String $operador, String $valor): void 
    {
        $this->unir("(".$clave, $operador, $valor.")")("not");
    }

    public function andCondicion(Condicion $andCond): void
    {
        $this->unirCond($andCond)("and");
    }

    public function orCondicion(Condicion $orCond): void
    {
        $this->unirCond($orCond)("or");
    }

    public function notCondicion(Condicion $notCond): void
    {
        $this->unirCond($notCond)("not");
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
        return !($this->condicion === []);
    }
}

