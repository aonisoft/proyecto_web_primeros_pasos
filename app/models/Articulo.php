<?php

class Articulo
{
    //`id`, 
    //(1, , , , , , , , 1, 0, 1, 0, 'default.jpg');

    public static function listar()
    {
        return [
            [
                'id' => '1',
                'nombre_articulo' => 'articulo 1',
                'stock' => 100,
                'precio_por_unidad' => 20,
                'disponibilidad' => 1,
                'visibilidad' => 1,
                'fecha_ingreso' => '2019-06-12 20:30:00',
                'fecha_reposicion' => '2019-06-12 20:30:00',
                'usuario_id' => 1,
                'descuento_por_cantidad' => 0,
                'descripcion_id' => 1,
                'destacado' => 0,
                'imagen' => 'default.jpg',
                'url' => 'articulo-1'
            ]
        ];
    }
}
