<?php

namespace nucleo;
use \PDO;

class Fabrica {
    public static function getConexion(String $nombre): PDO
    {
          /*Datos es un array*/
          $datos = $GLOBALS['bd'][$nombre];
          $dns = "";

          $dns .= $datos['engine'] . ":dbname=";
          $dns .= $datos['dBase'] . ";host=";
          $dns .= $datos['host'];

          $user = $datos['user'];
          $pass = $datos['pass'];

          return new PDO($dns, $user, $pass);
      }


    public static function addDatos(String $nombre, array $datos)
    {
        $GLOBALS['bd'][$nombre] = $datos;
    }
}
