<?php

namespace utiles\comunes;
use Closure;

function str_space(String $string) : String
{
    return " " . $string . " ";
}

function str_space_left(String $string): String
{
    return " " . $string;
}

function str_point(String $string1, String $string2) : String
{
    return $string1 . "." . $string2;
}

function str_jump(String $string) : String
{
    return "\n " . $string . " ";
}

function str_phsis(String $string) : String
{
    return "( " . $string . " )";
}

function cambiar (String $valor, String $remplaso ) : Closure
{
      return function (String $e) use ($valor, $remplaso)
      {
         return ($e === $valor)? $remplaso : $e;
      };
}


function concatenarArray($intermedio) : Closure
{
    return function($carry, $item) use($intermedio) : void
    {
        $carry[] = $intermedio;
        $carry[] = $item;
    };
               
}

function merge_arrays(array $array, Closure $funcion, array $destino=[]) : array
{
    foreach($array as $key => $item)
    {
        $destino = array_merge($destino, $funcion($key, $item));
    }
    return $destino;
}


//Pensada para utilizar en la funcion reduce.
function concatenar(String $intermedio) : Closure
{
      return function ($carry, $item) use ($intermedio) : String
      {
          return $carry . $intermedio . strval($item);
      };
}


function toArrayString (array $a, String $separacion=" ") : String 
{
    $temp = array_reduce($a, concatenar($separacion));
    return is_null($temp)? "" : $temp;
}


function mapArrayAplicative(array $semilla, array $funciones) : array
{
    foreach($funciones as $funcion)
    {
        $semilla = array_map($funcion, $semilla);
    }
    
    return $semilla;
}


function array_zip(array $origin, $elementDivisor) : Closure
{
    end($origin);

    return function(array $newZip=[]) use ($origin, $elementDivisor) : array
    {
        if(!($newZip === [])) $newZip[] = $elementDivisor;
        
        foreach($origin as $key => $elem)
        {
            $newZip[] = $elem;
            if(!($key === key($origin))) $newZip[] = $elementDivisor;
        }
        return $newZip;
    };
}

function showToString(string $elements): String
{    
     $temp = array_map(fn($elem) => ($elem == "\n")? "<br>": $elem, str_split($elements));
     $temp[] = "<br>";
     
     return toArrayString($temp, "");

}

function show(string $elements): void
{
     echo(showToString($elements));

}

function showArray(array $elements): void 
{
   echo(toArrayString($elements));
}
