<?php
//Diseñado para php-7.4
namespace modelo;

use modelo\metacolumnas\MetaColumna;
use modelo\Condicion;

use function modelo\utiles\toArrayString as toArrayString;
use function modelo\utiles\mapArrayAplicative as mapArrayAplicative;
use function modelo\utiles\cambiar as cambiar;
use nucleo\Fabrica;
use \PDO;
use Closure;

class Crud {
  private PDO $conexion /*PDO*/;
  private String $nombreTabla /*String*/;
  
    private $insert = ["insert", "into", "tab" , "(", "cols", ")", "values", "(", "vals", ")"];
    private $update = ["update", "tab", "set", "vals", "where", "cond"];
    private $delete = ["delete", "from", "tab", "where", "cond"];
    private $select = ["select", "cols", "from", "tab", "where", "cond", "lim", "ord"];

      
  private $show = ["show", "columns", "from", "tab"];
  private array $columnas;

  private $nombreAtributos /*array<String>*/;



    public function __construct(String $nTabla)
    {
        $this->nombreTabla = $nTabla;
        $this->conexion = Fabrica::getConexion("santos");
       
        $this-> getMetaColumnas();
    }


    private function remplazarNameTable(array $origen): array
    {
        return mapArrayAplicative($origen, [cambiar("tab", $this->nombreTabla)]);
    }
  

    private function callSQLGet(String $sentencia): array
    {
        try{
            return ($this-> conexion ->query($sentencia)) -> fetchAll();
        }catch(Exception $e){}

        return [];
    }


    private function getMetaColumnas(): void
    {
        $sentencia =  toArrayString ($this->remplazarNameTable($this->show));
        $arrayResult = $this->callSQLGet($sentencia);

        foreach($arrayResult as $fila)
        {
            $this-> columnas[] = new MetaColumna($fila);
        }
    }
  
  

    public function insert2(): void
    {

    }


    public function insert(array $datos): bool
    {
    $this->remplaceNameTable($this->insert);
        // $this->checkOrdenDatosInsert($datos);
        
        // $valores = $this->getSentenciaInsert($datos);
        // $columnas = $this->getColumnasInsert();
        
        // $query = $this->unirtSentenciaInsert();
    }



    /*
     * Este metodo solo resive una fila y la actualiza
     * No son muchas filas
     */

    public function update(Condicion $con, array $datos): bool
    {
    }

    public function delete(Condicion $con): bool
    {
    }

    private function selectWithCond(array $sent, Condicion $con): array
    {
        return mapArrayAplicative($sent,[cambiar("cond", $con->get())]);
    }
    
    private function selectWithOutCond(array $sent): array
    {
        return mapArrayAplicative($sent,[cambiar("cond", ""), cambiar("where", "")]);
    }

    private function preparadoSentenciaSelect(Condicion $con, String $lim, String $ord):array
    {
         
        $tem = mapArrayAplicative($this->select, [cambiar("tab", $this->nombreTabla),
                                                  cambiar("lim", "LIMIT " . $lim),
                                                  cambiar("ord", $ord)] );

        return ($con->hadCond())? $this->selectWithCond($tem, $con): $this->selectWithOutCond($tem);            
    }


    public function recuperar(Condicion $con, String $lim="", String $ord=""): array
    {
       return $this-> preparadoSentenciaSelect($con, $lim, $ord);
       
    }

   
    public function setNombre(String $nombreTabla): void
    {
    }

    public function show(): array
    {
        return $this-> columnas;
    }

}
