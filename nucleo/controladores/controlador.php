<?php
    
interface Controlador {
    
    function accionar(Evento $ev): IVista;
}


