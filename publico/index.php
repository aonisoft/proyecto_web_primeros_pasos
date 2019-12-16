<?php

require_once "../nucleo/hadleExceptions.php";

require_once "../nucleo/eventos/evento.php";
require_once "../nucleo/kernel.php";
require_once "../nucleo/iRouter.php";

require_once "../app/controladores/cInicio.php";
require_once "../app/router.php";

require_once "../config/rutas.php";


$kerInicio =  new Kernel();

$kerInicio-> ejecutar();

