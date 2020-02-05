<?php

namespace modelo\utiles;

use Closure;


function cambiar (String $valor, String $remplaso ) : Closure
{
      return function (String $e) use ($valor, $remplaso)
      {
         return ($e === $valor)? $remplaso : $e;
      };
}


//Pensada para utilizar en la funcion reduce.
function concatenar(String $intermedio) : Closure
{
      return function ($carry, $item) use ($intermedio) : String
      {
          return $carry . $intermedio . strval($item);
      };
}


function concatenarArray($intermedio) : Closure
{
    return function($carry, $item) use($intermedio)
    {
        $carry[] = $intermedio;
        $carry[] = $item;
    };
               
}

function array_last(array $a)
{
    end($a);
    return key($a);
}


function array_zip(array $origin, $elementDivisor) : array
{
    $newZip = [];
   
    foreach($origin as $key => $elem)
    {
        $newZip[] = $elem;
        $newZip[] = ($key === array_last($origin))? "": $elementDivisor;
    }
    return $newZip;
}


function toArrayString (array $a) : String 
{
    $temp = array_reduce($a, concatenar(" "));
    return is_null($temp)? "" : $temp;
}




