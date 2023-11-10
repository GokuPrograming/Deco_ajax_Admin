<?php

use Dompdf\Dompdf;
use Dompdf\Options;
require_once("../../vendor/autoload.php");
class imprimirPDF
{
    private $db;
    public function __construct()
    {
        $con = new Conexion();
        $this->db = $con->conectar();
    }
    public function crearPDF($idUser, $id_venta,$nombre)
    {
        $dompdf = new Dompdf();
        $html = '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <h1>HOLA MUNDO fffffff</h1>
        y yo que dsada
        <p>Usuario ID: ' . $idUser . '</p>
<p>id Venta: ' . $id_venta . '</p>
<p>nombre: ' . $nombre . '</p>
    </body>
    </html>
    ';

        $dompdf->loadHtml($html);
        $dompdf->render();

        // Especifica el nombre del archivo y permite mostrarlo en el navegador
        $dompdf->stream("documento.pdf", array('Attachment' => '0'));
        exit; // Importante para evitar la salida adicional que puede afectar al PDF
    }
}
