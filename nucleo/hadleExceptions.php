<?php
define('ARCHIVO', "../nucleo/errores/vista/error.html");

define('NOMBRES',["mensaje", "trace", "code", "file", "linea"]);


function __toArray(Throwable $e): array
{
    return [
        "mensaje"=>$e->getMessage(),
        "trace"=>$e->getTraceAsString(),
        "code"=>$e->getCode(),
        "file"=>$e->getFile(),
        "linea"=>$e->getLine()
    ];
}

function __cambio(Throwable $e): String
{
    $html = file_get_contents(ARCHIVO);

    $eArr =__toArray($e);

    for($i=0; $i<count(NOMBRES); $i++)
    {
       $html= str_replace("{{".NOMBRES[$i]."}}",$eArr[NOMBRES[$i]], $html);
    }

    return $html;    
}

function __excepcion(Throwable $e): void
    {
        if(DEBUG)
        {
            echo(__cambio($e));
        }else
        {
            echo("<h1>Error 404</h1>");
        }
    }


set_exception_handler('__excepcion');


