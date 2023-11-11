<?php

use Dompdf\Dompdf;
use Dompdf\Options;
use Dompdf\Autoloader;

require_once "../../vendor/autoload.php";
require_once '../../model/historialCompra.php';
ob_start();



class imprimirPDF
{

    private $db;
    public function __construct()
    {
        $con = new Conexion();
        $this->db = $con->conectar();
    }
    public function crearPDF($user, $fecha)
    {
        $mostrarVenta = new historialCompras();

        $venta = $mostrarVenta->MostrarICompras($user, $fecha);

        $dompdf = new Dompdf();
        $html = '
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            margin: 20px;
            background-color: #f4f4f4;
            color: #333;
        }

        h1 {
            color: #009688;
            text-align: center;
        }

        p {
            margin: 10px 0;
            line-height: 1.6;
        }

        .container {
            width: 80%;
            margin: 0 auto;
        }

        .card {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }

        /* Estilos adicionales según tus preferencias */
    </style>
</head>
<body>
    <div class="container">
        <h1>Reporte De compras</h1>
        ';
        foreach ($venta as $curso) {
            $html .= '
            <p>Usuario ID: ' . $curso['nombre'] . '</p>
            <p>id Venta: ' . $curso['fecha'] . '</p>
            <p>nombre: ' . $curso['id_venta'] . '</p>';
            
        }

        $html .= '
        </body>
        </html>';

        $dompdf->loadHtml($html);
        $dompdf->render();

        // Especifica el nombre del archivo y permite mostrarlo en el navegador
        $dompdf->stream("documento.'.$fecha.'.pdf", array('Attachment' => '0'));
        ob_end_flush();
        exit; // Importante para evitar la salida adicional que puede afectar al PDF

    }
}
