<?php

namespace modelo;

use function utiles\comunes\toArrayString;
use function utiles\comunes\array_zip;
use function utiles\comunes\merge_arrays;
use function utiles\comunes\str_jump;
use function utiles\comunes\str_phsis;
use function utiles\comunes\str_space_left;

use Closure;

class Select
{
    private array $sentencia;  
    private String $selecTipo;
    

    public static function createSelect(Closure $f): String
    {
        return $f( new Select(),  new Join(), new Condicion());
    }

    private function initArray(): void
    {
        $this->sentencia = [$this->selecTipo =>[],
                            "from" =>[], 
                            "where" =>[], 
                            "order" => [], 
                            "group" =>[]];
    }
    

    public function init(String $tipo, String $nameTable, array $columnas = ["*"]) : Select
    {
       $this->selecTipo = $tipo;
       $this->initArray();
                  
       $this->addColumns($columnas);
       $this->sentencia["from"][] = $nameTable;

       return $this;
    }
    
    private function addItems(array $origen, array $destino) : array
    {       
            return  array_zip($origen, ",")($destino);           
    }
    
    private function addColumns(array $cols) : void        
    {
        
        if($this->sentencia[$this->selecTipo]  == ["*"]) $this->sentencia[$this->selecTipo] = [];

        $this->sentencia[$this->selecTipo] = $this->addItems($cols, $this->sentencia[$this->selecTipo]);
    }
  
       
    public function addGroup(String $columna) : Select
    {
        $this->sentencia["group"] = $this->addItems([$columna], $this->sentencia["group"]);   
        return $this;
    }

    public function setJoin(Join $join) : Select
    {
        $this->sentencia["from"] = $join->get(); 
        return $this;
    }

    private function getSentenciaOrder(String $col, bool $ord): array
    {
        return [ $col . str_space_left($ord? KWSQL["desc"] : "") ];
    }

    public function addOrder(String $columna, bool $ord=false) : Select    
    { 
        $this->sentencia["order"] = $this-> addItems($this->getSentenciaOrder($columna, $ord), $this->sentencia["order"]); 
        return $this;  
     }


    public function setCondicion(Condicion $condicion) : Select
    {
        $this->sentencia["where"] = $condicion->getArray();        
        return $this;
    }

   
    private function preparar() : array
    {
         return merge_arrays($this->sentencia,  
             function(String $key, array $valores): array
             {
                 return ($valores == [])? $valores: array_merge([KWSQL[$key]], $valores);
             });              
    }
    
    public function get() : String
    {        
        return toArrayString($this->preparar());
    }
}
