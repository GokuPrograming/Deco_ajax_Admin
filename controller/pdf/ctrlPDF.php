<?php

use Dompdf\Dompdf;
use Dompdf\Options;
use Dompdf\Autoloader;

require_once '../../model/historialCompra.php';
require_once("../../vendor/autoload.php");
require_once '../../adodb5/adodb.inc.php';
require_once '../../model/imprimirPDF.php';
require_once '../../model/conexion.php';

$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isPhpEnabled', true);
$imprimir = new imprimirPDF();

$dompdf = new Dompdf($options);
// Devuelve el contenido como respuesta
//echo $content;
$mostrarVenta = new historialCompras();

if (isset($_GET['opc'])) {
    $opc = $_GET['opc'];
    //echo ($opc);
    switch ($opc) {
        case '1': ///mostrar historial de compras
            if (isset($_SESSION["id_usuario"])) {
                echo '<table>
                        <thead>
                          <tr>
                            <th>usuario</th>
                            <th>fecha</th>
                            <th>Folio</th>
                            <th>PDF</th>
                          </tr>
                        </thead>
                        <tbody>';  // Abre el cuerpo de la tabla fuera del bucle
        
                $venta = $mostrarVenta->MostrarCompras($_SESSION["id_usuario"]);
                foreach ($venta as $curso) {
                    echo '<tr>
                            <td>' . $curso['nombre'] . '</td>
                            <td>' . $curso['fecha'] . '</td>
                            <td>' . $curso['id_venta'] . '</td>
                            <td>
                            <a href="../controller/pdf/ctrlPDF.php?opc=2&id_venta=' . $curso['id_venta'] . '&fecha=' . $curso['fecha'] . '" target="_blank"         
                           > <img src="../assets/img/pdf.png" alt="PDF Icon" style="width: 40px; height: 40px;">
                            </a>
                            </td>
                          </tr>';
                }
        
                echo '</tbody></table>';  // Cierra el cuerpo de la tabla después del bucle
            } else {
                echo "El usuario no está definido";
            }
            break;
        
        case '2': //imprimir pdf
            $id_venta = isset($_GET['id_venta']) && isset($_GET['fecha']) ? $_GET['id_venta'] : NULL;
            $fecha = isset($_GET['fecha']) ? $_GET['fecha'] : NULL;

            $fecha = $_GET['fecha'];
            echo $fecha . "  " . $_SESSION["id_usuario"] . " " . $id_venta;

            $imprimir->crearPDF($_SESSION["id_usuario"], $fecha);
            exit;
    }
}
