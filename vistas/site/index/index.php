<?php
class VIndex implements IVista
{
    private $raiz_vista = "./vistas/site/";
    private $datos_remplazo;
    private $param;

    private $estruct_articulo =
    [
        'vista' => $this->datos_remplazo['vista']['articulo'],
        'contenidos' => [
            ['{{col}}', "col-sm-4"],
            ['{{url}}', $art-> getValor("url")],
            ['{{url_imagen}}', $art->getValor("imagen")],
            ['{{descripcion_imagen}}', $art->getValor("nombre")]

        ]
    ];

    public function __construct(array $param)
    {
        $this->param = isset($param) ? $param : [];
        $this->datos_remplazo =
            [
                'url_vista' =>
                [
                    'articulo' => $this->raiz_vista . "_articulo.html",
                    'seccion' => $this->raiz_vista . "_seccion.html"
                ]
            ];
    }

    private function crearSeccion(): String
    {
        $articulos = $this->generarArticulos();

        $html = UtilesVista::reemplazar([
            'url_vista' => $this->datos_remplazo['vista']['seccion'],
            'contenido' => [
                'aparicion' => '{{contenido}}',
                'reemplazar' => $articulos
            ],

        ]);

        return $html;
    }

    private function generarArticulos(): String
    {

        //col,url,ruta_imagen,descripcion_imagen,contenido
        $articulos = $this->param['a'];
        $html = "";
        foreach ($articulos as $articulo) {
            $html .= UtilesVista::reemplazar(
                [
                    ,
                    ]
                ]
            );
        }
        return $html
    }

    public function mostrar(): String
    {
        $html_index = "";
        $html_index .= $this->crearSeccion();
        return $html_index;
    }

    //foreach ($articulos as $articulo) { }


}
