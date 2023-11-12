<?php
require_once '../model/usuario.php';
require_once '../model/conexion.php';

// Comprobar si se recibió una solicitud POST para iniciar sesión
$rolUser = $_SESSION['id_rol'];
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

    <!--CODIGO QUE ES PARA USUARIO-->


</head>
<script>
    function cargarBarraDeNavegacion() {
        $.ajax({
            url: '../controller/user/ctrlUser.php?opc=7',
            type: 'GET',
            success: function(response) {
                $('#barra-navegacion-container').html(response);
            },
            error: function() {
                // Maneja errores si la solicitud AJAX falla
                $('#barra-navegacion-container').html('Error al cargar la barra de navegación');
            }
        });
        contador();
    }
    //metodo Generico de peticion con URL(hacer peticiones de insercion)
    function realizarSolicitudAjax(url, datos, elemento) {
        $.ajax({
            type: "POST",
            url: url,
            data: datos,
            success: function(response) {
                $(elemento).slideUp(500, function() {
                    // Cuando la animación de deslizamiento hacia arriba termine, cambiamos el contenido y luego lo deslizamos hacia abajo.
                    $(this).html(response).slideDown('slow');
                    setTimeout(function() {
                        $(elemento).slideUp(
                            'slow'); // Corrección: debe ser slideUp en lugar de slideUP
                    }, 3000);
                });
            }
        });
    }
    //meotodos para obtener parametros
    function agregarACarrito(id_lista_cursos, url, elemento) {
        realizarSolicitudAjax(
            "../controller/user/ctrlUser.php?opc=2", {
                id_lista_cursos: id_lista_cursos
            },
            '#tbMensajes');
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
<!-- elementos del HTML -->

<body>
<a href="gmail/index.html">enviar correo</a>
    <div id="barra-navegacion-container"></div>

    <a href="../view/carrito.php">Ir a carrito</a>
    <!--manda a carrito-->
    <!--mensajes de que el metodo funcionó-->
    <br>

    <!-- mostrarr todos los productos -->
    <h1 class="display-3 text-center titulo-sc p-3 p-md-5">Todos los productos</h1>
    <div id="tbMensajes" class="alert" role="alert">
    </div>
    <div>
        <div class="container" id="app">
            <div class="row align-items-start">

            </div>
        </div>
    </div>
    <div id="footer"></div>

    <!--- fin del contendor de produtos--->
</body>

</html>


<script>
    //metodo que permite pedir el rol del usuario y lo copara para mandar a los metodos
    function decision() {
        $.ajax({
            url: '../controller/x.php', // Reemplaza con la ruta correcta
            type: 'GET',
            dataType: 'json',
            success: function(respuesta) {
                console.log(respuesta);

                if (respuesta.tipo === 'admin') {
                    mostrarAdminTo();
                } else if (respuesta.tipo === 'user') {
                    mostrarUserTo();
                } else if (respuesta.tipo === 'NE') {
                    location.href = '../index.php';
                }
            },
            error: function(error) {
                console.error('Error al obtener id_rol:', error);
            }
        });
    }

    $(document).ready(function() {
        // Realiza una solicitud AJAX para obtener el valor de id_rol desde PHP
        decision();
        cargarBarraDeNavegacion();
        footer();
        contador();

    });

    function cargarContenidoEnElemento(url, elemento) {
        $.ajax({
            type: "GET",
            url: url,
            data: {},
            success: function(data) {
                $(elemento).html(data);
            }

        });
    }

    function mostrarUserTo() {
        cargarContenidoEnElemento("../controller/user/ctrlUser.php?opc=1", '#app');
    }

    function mostrarAdminTo() {

        cargarContenidoEnElemento("../controller/Admin/ctrlAdmin.php?opc=1", '#app');
    }
</script>