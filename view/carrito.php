<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <!-- Asegúrate de que las rutas a los archivos JavaScript sean correctas -->
    <script src="../assets/js/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="../assets/css/carrito.css">
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Función para borrar un elemento del carrito
      

        function borrarDeCarrito(id_lista_cursos) {
            $.ajax({ 
                type: "POST",
                url: "../controller/user/ctrlUser.php?opc=4",
                data: {
                    id_lista_cursos: id_lista_cursos
                },
                success: function(data) {
                    $('#tbMensajes').html(data); // Actualiza la tabla del carrito
                }
            });
            recargarPagina();

        }

        function comprarCarrito() {
            // Agrega al carrito
            $.ajax({
                type: "POST",
                url: "../controller/user/ctrlUser.php?opc=5",
                data: {},
                success: function(data) {
                    $('#compra').html(data); // Actualiza la tabla del carrito
                },
            });
            recargarPagina();
        }
    </script>

</head>

<body>



    <header class="cheader" id="a">
        <h1>CARRITO <img src="../assets/img/carrito-de-compras.png" width="50px" height="auto"></h1>
        <div><a href="../view/main.php"><img src="../assets/img/izquierda.png" alt="" width="50px" height="auto"></a>
        </div>
    </header>

    <main id="objetoBorrado">
        <div class="container1">
            <table id="mostrarCarro"></table>
        </div>

        <div class="container1">

        </div>
    </main>
    <div id="MostrarMonto"></div>
    <a href="google.com">google</a>
    <div id="tbMensajes"></div>
    <div id="compra"></div>



    <div id="footer"></div>
</body>

</html>

<script>
    function recargarPagina() {
        $.ajax({
            type: "GET",
            url: "../controller/user/ctrlUser.php?opc=3",
            data: {},
            success: function(data) {
                $('#mostrarCarro').html(data);
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
    // Carga la tabla del carrito y el valor total a pagar al cargar la página
    $(document).ready(function() {
        recargarPagina();
        footer();

    });
</script>