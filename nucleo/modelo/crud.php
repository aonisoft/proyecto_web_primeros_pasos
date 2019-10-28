
<?php

class Crud {
    private $coneccion /*PDO*/;
    private $nombreTabla /*String*/;
    private $insert /*String*/;
    private $update /*String*/;
    private $delete /*String*/;
    private $select /*String*/;
    private $show /*String*/;

    public function insert(array $datos): bool
    {
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

    public function recuperar(Condicion $con): array
    {
    }

    public function setSelect(String $columnas): void
    {
    }

    public function setNombre(String $nombreTabla): void
    {
    }

    public function show(): array
    {
    }

}
