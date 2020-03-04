<?php

namespace modelo\utiles;

use function utiles\comunes\str_space;
use function utiles\comunes\str_phsis;

function as_(String $original, String $alias) : String
{
    return $original . str_space(KWSQL["as"]) . $alias;
}

function sum(String $columna) : String 
{
    return KWSQL["sum"] . str_phsis($columna);
}

function avg(String $columna) : String 
{
    return KWSQL["avg"] . str_phsis($columna);
}

function count(String $col) : String
{
    return KWSQL['count'] . str_phsis($col);
}