<?php
class UtilesVista
{
    public static function reemplazar($datos): String
    {
        try {
            ExceptionEspecial::estaSeteada($datos);
        
            $html = file_get_contents($datos['url_vista']);
                                
            foreach ($datos['contenidos'] as $variable) {                
                $html = str_replace($variable[0], $variable[1], $html);
            }

        } catch (Exception $ex) {
            if (DEBUG_DEVELOP) {
                echo $ex->getMessage();
            }
            $html = "";
        }

        return $html;
    }
    
    
}

