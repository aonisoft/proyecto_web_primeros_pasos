<?php

namespace modelo;

use Closure;
use function utiles\comunes\str_point;
use function utiles\comunes\str_space;

class Join 
{
    private array $join = [];

    public static function formarJoin(String $tabla1, String $tabla2): Closure
    {
        return function(String $key1, String $key2) use($tabla1, $tabla2): array
        {
            return ["tabla1" => $tabla1, "key1" => $key1, "tabla2" => $tabla2, "key2" => $key2];
        };
    }
    
    private function addJoin(array $valores, String $tipo) : array
    {
        return [ ($this->join == [])? $valores["tabla1"]: "" 
                ,KWSQL[$tipo] . str_space(KWSQL["join"])               
                ,$valores["tabla2"]
               ];        
    }

    private function addOnJoin(array $valores, String $condicion = "=")
    {
       return [ KWSQL["on"]
                ,str_point($valores["tabla1"], $valores["key1"])
                ,$condicion
                ,str_point($valores["tabla2"],$valores["key2"])
              ];
    }

    private function union(array $valores, String $condicion): Closure
    {
        return function(String $tipo) use ($valores, $condicion): array
        {
            return array_merge($this->addJoin($valores, $tipo), $this->addOnJoin($valores, $condicion));            
        };
        
    }
    private function unirJoin(array $adicional): void
    {
        $this->join = array_merge($this->join, $adicional);
    }

    public function addInner(array $valores, String $condicion): Join
    {
        $this->unirJoin($this->union($valores, $condicion)("inner"));
        return $this;
    }


    public function addLeft(array $valores, String $condicion): Join
    {
        $this->unirJoin($this->union($valores, $condicion)("left"));
        return $this;
    }


    public function addRight(array $valores, String $condicion): Join
    {
        $this->unirJoin($this->union($valores, $condicion)("right"));
        return $this;
    }


    public function addFull(array $valores, String $condicion): Join
    {
        $this->unirJoin($this->union($valores, $condicion)("full"));
        return $this;
    }

    public function get(): array
    {
        return $this->join;
    }
}