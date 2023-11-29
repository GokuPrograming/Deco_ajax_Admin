<?php
session_start();
if (isset($_SESSION['id_usuario'])) {
    //header('location: view/main.php');
    // You may want to remove this echo statement unless it's for debugging purposes
    // echo "sesion" . $_SESSION['id_usuario'];
} else {
    //echo "Sesión no iniciada";
    header('location: Login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todos los productos</title>
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!--texta alaig-->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!--mostrar productos v2-->
    <link rel="stylesheet" href="../assets/css/main2.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HISTORIAL DE COMPRAS</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>




    <script>
        function cargarBarraDeNavegacion() {
            $.ajax({
                url: '../controller/pdf/ctrlPDF.php?opc=1',
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

        function cargarBarraDeNav() {
            $.ajax({
                url: '../controller/user/ctrlUser.php?opc=7',
                type: 'GET',
                success: function(response) {
                    $('#barra-navegacion').html(response);
                },
                error: function() {
                    // Maneja errores si la solicitud AJAX falla
                    $('#barra-navegacion').html('Error al cargar la barra de navegación');
                }
            });
            contador();
        }

        function contador() {
            $.ajax({
                url: "../controller/user/ctrlUser.php?opc=6", // Ruta al archivo de servidor
                type: "GET",
                success: function(data) {
                    $("#contador-value").text("" + data); // Muestra el valor en la barra de navegación
                }
            });
        }

        function imprimir() {
            // Agrega al carrito
            $.ajax({
                type: "POST",
                url: "../controller/pdf/ctrlPDF.php?opc=2",
                data: {},
                success: function(data) {
                    $('#compra').html(data); // Actualiza la tabla del carrito
                },
            });
        }
        function footer() {
        $.ajax({
            url: '../controller/user/ctrlUser.php?opc=8',
            type: 'GET',
            success: function(response) {
                $('#footer').html(response);
            },
            error: function() {
                // Maneja errores si la solicitud AJAX falla
                $('#footer').html('Error al cargar la barra de navegación');
            }
        });
    }
    </script>

<style>
body .table {
    align-items: center;
}

table {
    width: 90%;
    border-collapse: collapse;
    margin-top: 50px;
    margin-bottom: 400px;
}

th, td {
    border-radius: 1%;
    padding: 12px;
    text-align: center;
}

th {
    background-color: rgb(255, 157, 34);
}

/* Estilos para pantallas más pequeñas */
@media screen and (max-width: 600px) {
    table {
        margin-left: 10px;
        margin-right: 10px;
    }
    th, td {
        padding: 8px;
    }
}

  </style>

</head>

<body>
    <div id="barra-navegacion"></div>

    <div id="barra-navegacion-container"></div>
    <div id=""></div>
<div id="footer"></div>
  
</body>

</html>


<script>
    $(document).ready(function() {
        // Realiza una solicitud AJAX para obtener el valor de id_rol desde PHP
        cargarBarraDeNavegacion();
        cargarBarraDeNav();
        contador();
        footer();



    });
</script>