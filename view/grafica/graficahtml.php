<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grafica</title>
</head>

<style>
    .miGraficaContainer {
        width: 400px;
        /* Ancho deseado */
        height: 300px;
        /* Alto deseado */
    }
</style>

<body>
    <div id="miGraficaContainer">


    </div>

    <form action="" method="post">
        <p>ingresa el periodo</p>
        <input type="text" id="fechaInicio" class="fadeIn third" name="fechaInicio" placeholder="FechaInicio" required>
        <input type="text" id="fechaFinal" class="fadeIn third" name="fechaFinal" placeholder="Fecha final" required>
        <input type="button" value="Generar Gráfica" onclick="opc()">
    </form>
    <div class="miGraficaContainer">
        <canvas id="miGrafica"></canvas>
    </div>
    <div id="contenido">
        aaaa
        <script>
            function grafica() {
                $.ajax({
                    type: "GET",
                    //C:\xampp\htdocs\Deco_ajax_Admin\controller\Admin\ctrlPanel.php
                    //C:\xampp\htdocs\Deco_ajax_Admin\view\grafica\graficahtml.php
                    url: "../../controller/Admin/ctrlPanel.php?opc=4",
                    data: {}, // Agrega una coma aquí
                    success: function(data) {
                        $('#miGraficaContainer').html(data);
                    }
                });
            }
        </script>
    </div>


</body>

</html>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Llamada AJAX para obtener los datos desde PHP
        var fechaInicioValue = $("#fechaInicio").val();
        var fechaFinalValue = $("#fechaFinal").val();
        $.ajax({
            type: "GET",
            url: "../../controller/Admin/ctrlPanel.php?opc=4",
            data: {
                fechaFinalValue
            },
            success: function(data) {
                // Parsea los datos JSON obtenidos
                var jsonData = JSON.parse(data);
                console.log(data);
                // Configuración de la gráfica
                var ctx = document.getElementById('miGrafica').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: Object.keys(jsonData),
                        datasets: [{
                            label: 'Mi Gráfica',
                            backgroundColor: 'rgb(0, 0, 255)',
                            data: Object.values(jsonData)
                        }]
                    }
                });
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error("Error en la llamada AJAX:", textStatus, errorThrown);
            }
        });
    });
</script>
<script>
    jQuery(function() {
        jQuery("#fechaInicio").datepicker({
            dateFormat: "yy-mm-dd", // Formato de fecha "YYYY-MM-DD"
            changeYear: true, // Permite cambiar el año
            changeMonth: true, // Permite cambiar el mes
            yearRange: "1900:2023" // Rango de años permitidos
        });
    });
    jQuery(function() {
        jQuery("#fechaFinal").datepicker({
            dateFormat: "yy-mm-dd", // Formato de fecha "YYYY-MM-DD"
            changeYear: true, // Permite cambiar el año
            changeMonth: true, // Permite cambiar el mes
            yearRange: "1900:2023" // Rango de años permitidos
        });
    });

    function opc() {
        var fechaInicioValue = $("#fechaInicio").val();
        var fechaFinalValue = $("#fechaFinal").val();
        $.ajax({
            type: "GET",
            //C:\xampp\htdocs\Deco_ajax_Admin\controller\Admin\ctrlPanel.php
            //C:\xampp\htdocs\Deco_ajax_Admin\view\grafica\graficahtml.php
            url: "../../controller/Admin/ctrlPanel.php?opc=5&fechaInicio=" + fechaInicioValue + "&fechaFinal=" + fechaFinalValue,
            data: {}, // Agrega una coma aquí
            success: function(data) {

                $('#miGraficaContainer').html(data);
            }
        });
    }
</script>
<script>
    $(document).ready(function() {
        grafica();
        opc();
    });
</script>