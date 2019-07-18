<?php
class VIndex implements IVista
{
    private $raiz_vista = "../vistas/site/index/";
    private $datos_remplazo;
    private $param;

    private $estruct_articulo = array();

    public function getEstilos()
    { }

    public function getScripts()
    { }
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
        $this->estruct_articulo = [
            'vista' => $this->datos_remplazo['url_vista']['articulo'],
            'contenidos' => [
                [
                    '{{col}}', "col-sm-4",
                    //['{{url}}', $art->getValor("url")],
                    //['{{url_imagen}}', $art->getValor("imagen")],
                    //['{{descripcion_imagen}}', $art->getValor("nombre")],
                    '{{url}}', "probando",
                    '{{url_imagen}}', "defecto.jpg",
                    '{{descripcion_imagen}}', "esto_es_una_imagen",
                ]
            ]
        ];
    }

    private function crearSeccion(): String
    {
        $articulos = $this->generarArticulos();

        $html = UtilesVista::reemplazar([
            'url_vista' => $this->datos_remplazo['url_vista']['seccion'],
            'contenidos' => [
                [
                    '{{contenido}}', $articulos
                ]
            ],

        ]);
        return $html;
    }

    private function generarArticulos(): String
    {

        //col,url,ruta_imagen,descripcion_imagen,contenido
        $articulos = $this->param['articulos'];
        $html = "";
        $url_vista_articulo = $this->datos_remplazo['url_vista']['articulo'];
        echo $url_vista_articulo;
        foreach ($articulos as $articulo) {
            $html .= UtilesVista::reemplazar(
                [
                    'url_vista' => $url_vista_articulo,
                    'contenidos' => [
                        ['{{col}}', "col-sm-4"],
                        ['{{url}}', $articulo['url']],
                        ['{{ruta_imagen}}', 'public/files/articulo/1/articulo.jpg'],
                        ['{{descripcion_imagen}}', "probando algo"],
                        ['{{contenido}}', "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Recusandae iusto fugit molestias nulla sapiente dolorum a fugiat laboriosam tenetur, voluptatem unde. Porro soluta saepe perspiciatis, totam perferendis odio. Labore, commodi."]
                    ]
                ]
            );
        }
        return $html;
    }

    public function mostrar(): String
    {
        $html_index = "";
        $html_index .= $this->header;
        $html_index .= $this->crearSeccion();
        $html_index .= $this->footer;
        return $html_index;
    }

    //foreach ($articulos as $articulo) { }


}
