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
    <script src="https://www.paypal.com/sdk/js?client-id=ATsXThlRKQMIDRsC0xX-EWt57Vg_FkznXcQNTrWdHgT-X2337ZiEuWGnnOgtubRXGfMJICcIOZ_lZ6aY&currency=MXN">
    </script>
    <!-- Agrega estos enlaces en el head de tu HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

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
            recargarPaginaT();

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


    <div id="currencyCode"></div>
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
    var g;

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


    var total; // Variable global para almacenar el valor total
    var titulo;
    var currencyCode;

    var id;

    function recargarPaginaT() {
        $.ajax({
            type: "GET",
            url: "../controller/user/ctrlUser.php?opc=12",
            data: {},
            success: function(data) {
                try {
                    // Intenta analizar la respuesta como JSON
                    var respuestaJSON = JSON.parse(data);

                    // Verifica si la respuesta contiene la clave 'total'
                    if ('total' in respuestaJSON) {
                        total = respuestaJSON.total;
                        /// esto lo puedes ignorar ya que no es iportante, el chiste es que pague XD
                        //recibe el json de los parametros del  php
                        productos = respuestaJSON.productos;
                        for (var i = 0; i < productos.length; i++) {
                            var nombre = productos[i].nombre;
                            var precio = productos[i].precio;
                            console.log("nombre:", nombre);
                            console.log("precio:", precio);
                        }
                        // Hacer algo con el valor total
                        console.log("Total:", total);



                        // Llama a la función de PayPal después de obtener el valor
                        inicializarPayPal(total);
                    } else {
                        console.error('La respuesta no contiene la clave "total".');
                    }
                } catch (error) {
                    console.error('Error al analizar la respuesta como JSON:', error);
                }
            }
        });
    }

    function inicializarPayPal(total) {
        paypal.Buttons({
            style: {
                color: 'blue',
                shape: 'pill',
                label: 'pay'
            },
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: total
                                .toString() //el valro total es el valor que aparecera al momento de pagar
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                actions.order.capture().then(function(details) {
                    // Extract values from the details object
                    var purchaseUnit = details.purchase_units[0];
                    var amount = purchaseUnit.amount.value;
                    currencyCode = purchaseUnit.amount.currency_code;
                    var estado = details.status;
                    id = details.id;
                    // Log or use the extracted values
                    console.log(details);
                    console.log("Amount:", amount);
                    console.log("Currency Code:", currencyCode);
                    console.log("estado:", estado);
                    //comprarCarrito();
                    console.log("id:", id);
                    ComprarConPaypal(id);

                });

            },
            // Payment canceled
            onCancel: function(data) {
                alert('Payment canceled');
                console.log(data);
            }
        }).render('#paypal-button-container');
    }

    function ComprarConPaypal(id) {
        // Muestra un mensaje de espera
        Swal.fire({
            title: 'Espere por favor...',
            allowOutsideClick: false,
        showConfirmButton: false, // Ocultar el botón de confirmación
            onBeforeOpen: () => {
                Swal.showLoading();
            }
        });

        // Agrega al carrito
        $.ajax({
            type: "POST",
            url: "../controller/user/ctrlUser.php?opc=5",
            data: {
                id: id
            },
            success: function(data) {
                // Cierra el mensaje de espera
                Swal.close();

                // Muestra mensaje de éxito
                Swal.fire({
                    title: '¡Éxito!',
                    text: 'El ticket se ha enviado al correo.',
                    icon: 'success',
                    confirmButtonText: 'Ok'
                });

                // Actualiza la tabla del carrito
                $('#currency').html(data);
            },
            error: function() {
                // Cierra el mensaje de espera y muestra un mensaje de error si falla la solicitud AJAX
                Swal.close();
                Swal.fire({
                    title: 'Error',
                    text: 'Hubo un error al procesar la solicitud.',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                });
            }
        });
        recargarPagina();
    }

    // Llama a la función al cargar la página

    $(document).ready(function() {
        recargarPagina();
        footer();
        recargarPaginaT();

    });

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
</script>

<script>
    // pasarela de pago con paypal
</script>