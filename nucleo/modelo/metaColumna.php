<?php

namespace modelo\metaColumnas;

/*Verlo como un struct*/

class MetaColumna
{
    public $nombre /*String*/;
    public $tipo /*String*/;
    public $nulo /*bool*/;
    public $clave /*int*/;
    public $default /*String*/;
    public $extra /*String*/;

    public function __construct(array $valores)
    {
        $this->nombre = $valores[0];
        $this->tipo = $valores[1];
        $this->nulo = ($valores[2] == "Yes");
        $this->clave = $valores[3];
        $this->default = $valores[4];
        $this->extra = $valores[5];
    }

    
}
