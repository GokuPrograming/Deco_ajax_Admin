<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        function cargarBarraDeNavegacion() {
            $.ajax({
                url: '../controller/user/ctrlUser.php?opc=10',
                type: 'GET',
                success: function(response) {
                    $('#barra-navegacion-container').html(response);
                },
                error: function() {
                    // Maneja errores si la solicitud AJAX falla
                    $('#barra-navegacion-container').html('Error al cargar la barra de navegación');
                }
            });

        }

        function imprimir() {
            // Agrega al carrito
            $.ajax({
                type: "POST",
                url: "../controller/user/ctrlUser.php?opc=9",
                data: {},
                success: function(data) {
                    $('#').html(data); // Actualiza la tabla del carrito
                },
            });
        }
    </script>
</head>

<body>
    <div id="barra-navegacion-container"></div>
    <div id="compra"></div>
</body>

</html>


<script>
    $(document).ready(function() {
        // Realiza una solicitud AJAX para obtener el valor de id_rol desde PHP
        cargarBarraDeNavegacion();



    });
</script>