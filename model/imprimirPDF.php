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
                <title>Reporte de Compras</title>
                <style>
                    body {
                        margin: 20px;
                        background-color: #f4f4f4;
                        color: #333;
                    }
    
                    .header {
                        background-color: #009688;
                        color: #fff;
                        text-align: center;
                        padding: 10px;
                    }
    
                    .container {
                        width: 80%;
                        margin: 0 auto;
                        background-color: #fff;
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                        padding: 20px;
                        margin-top: 20px;
                    }
    
                    h1 {
                        color: #009688;
                        text-align: center;
                    }
    
                    p {
                        margin: 10px 0;
                        line-height: 1.6;
                    }
    
                    .venta-details {
                        border-bottom: 1px solid #ddd;
                        padding-bottom: 10px;
                        margin-bottom: 10px;
                    }
    
                    /* Estilos adicionales según tus preferencias */
                </style>
            </head>
            <body>
                <div class="header">
                    <h1>Reporte de Compras</h1>
                </div>
    
                <div class="container">
        ';
    
        foreach ($venta as $curso) {
            $html .= '
                <div class="venta-details">
                    <p>Cliente: ' . $curso['nombre'] . '</p>
                    <p>Fecha de compra: ' . $curso['fecha'] . '</p>
                    <p>Folio:  ' . $curso['id_venta'] . '</p>
                    <p>Id de transaccion: ' . $curso['id_paypal'] . '</p>
                    <p>Titulo: ' . $curso['titulo'] . '</p>
                    <p>Precio: ' . $curso['precio'] . '</p>


                </div>';
        }
    
        $html .= '
                </div>
            </body>
            </html>
        ';
    
        $dompdf->loadHtml($html);
        $dompdf->render();
    
        // Especifica el nombre del archivo y permite mostrarlo en el navegador
        $dompdf->stream("documento.'.$fecha.'.pdf", array('Attachment' => '0'));
        ob_end_flush();
        exit; // Importante para evitar la salida adicional que puede afectar al PDF
    }
    
}
