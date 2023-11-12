<?php

use Dompdf\Dompdf;
use Dompdf\Options;
use Dompdf\Autoloader;

require_once("../../vendor/autoload.php");
require_once '../../model/model_cursos.php';
require_once '../../model/conexion.php';
require_once '../../model/carrito.php';
require_once '../../model/historialCompra.php';
require_once '../../adodb5/adodb.inc.php';
require_once '../../model/imprimirPDF.php';
$content = 'Este es el contenido del panel de usuario.';


$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isPhpEnabled', true);

$dompdf = new Dompdf($options);
// Devuelve el contenido como respuesta
//echo $content;

$mostrar = new model_cursos();
$mostrarVenta = new historialCompras();
$carrito = new carrito();
$imprimir = new imprimirPDF();


//echo 'llego al controlador';
if (isset($_GET['opc'])) {
    $opc = $_GET['opc'];
    //echo ($opc);
    switch ($opc) {
        case '1':
            if (isset($_SESSION["id_usuario"])) {
                $cursos = $mostrar->mostrarTodosLosCursos();
                echo '<div class="curso-grid">';
                foreach ($cursos as $curso) {
                    echo '
                    <div class="curso-card">
                        <img src="../assets/img/' . $curso['imagen'] . '" class="img" loading="lazy">
                        <div class="separador">
                            <input type="button" class="btn btn-danger" value="AGREGAR A CARRITO" onclick="agregarACarrito(' . $curso['id_lista_cursos'] . ')">
                        </div>
                        <p class="display-1 pt-2 nombre-pro">' . $curso['titulo'] . '</p>
                        <p class="cat-origen pb-1">Precio=' . $curso['precio'] . '</p>
                        <hr class="m-0 p-0">
                    </div>';
                }
                echo '</div>';
            } else {
                echo "El usuario no está definido";
            }

            break;


        case '2': ///agregar producto a carrito
            if (isset($_POST['id_lista_cursos']) && isset($_SESSION["id_usuario"])) {
                $id_lista_cursos = $_POST['id_lista_cursos'];
                $idUser = $_SESSION["id_usuario"];

                $UnidadesCompradas = $carrito->verificarSiEstaEnComprados($idUser, $id_lista_cursos);

                if ($UnidadesCompradas > 0) {
                    echo "Ya has comprado este artículo <br>";
                } else {
                    $UnidadesEnCarrito = $carrito->verificarSiEstaEnCarro($idUser, $id_lista_cursos);

                    if ($UnidadesEnCarrito > 0) {
                        echo "Este artículo ya está en tu carrito. <br>";
                    } else {
                        $carrito->insertarACarrito($idUser, $id_lista_cursos);
                        echo "Artículo insertado en tu carrito. User: $idUser, Curso: $id_lista_cursos <br>";
                    }
                }
            } else {
                echo "Error: No se proporcionó el ID de lista de cursos o el usuario no está definido.";
            }
            break;


        case '3': ///muestra los elementos en la pagina de carrito
            if (isset($_SESSION["id_usuario"])) {
                echo 'Sesión de usuario ID=' . $_SESSION["id_usuario"];

                // Crear una instancia de la clase 'carrito'
                $carrito = new carrito();
                $total = $carrito->Total_pagar($_SESSION["id_usuario"]);
                $cursosEnCarrito = $carrito->obtenerCursosCarrito($_SESSION["id_usuario"]);

                //MUESTRA DE CARRITO
                if ($cursosEnCarrito) {
                    foreach ($cursosEnCarrito as $curso) { 

                        echo '
                      
                                <table class="container1" id="mostrarCarro">
                                <tr>
                                    <!--<td><img src="../assets/img/' . $curso['imagen'] . '" alt="' . $curso['titulo'] . '">
                                    </td>-->
                                    <td>
                                        <figcaption class="titulo">' . $curso['titulo'] . '</figcaption>
                                        <figcaption class="titulo"><img src="../assets/img/etiqueta-del-precio.png" width="25px" height="25px"
                                                alt="">' . $curso['precio'] . '</figcaption>
                                    </td>
                                    <td>
                                    <input type="button" class="btn btn-danger" value="ELIMINAR" onclick="borrarDeCarrito(' . $curso['id_lista_cursos'] . ')">
                                    </td>
                                </tr>
                                </table>';
                    } ///SECCION DE PAGO 
                    echo ' <p>TOTAL A PAGAR:' . $total . '</p>';
                    echo '<input type="button" class="btn btn-danger" value="Comprar" onclick="comprarCarrito()">';
                } else {
                    echo "El carrito está vacío.";
                }
            } else {
                echo "El usuario no está definido";
            }
            break; 
        case '4': //elimina un elemento del carrito
            if (isset($_SESSION["id_usuario"])) {
                $carrito = new carrito();
                $id_lista_cursos = $_POST['id_lista_cursos'];
                $idUser = $_SESSION["id_usuario"];
                $carrito->eliminarProcductoDeCarrito($idUser, $id_lista_cursos);
            } else {
                echo "El usuario no está definido";
            }
            break;
        case '5': ///comprarCArro
            if (isset($_SESSION["id_usuario"])) {
                $carrito = new Carrito(); // Asegúrate de que la clase Carrito esté definida
                $idUser = $_SESSION["id_usuario"];
                $carrito->comprarCarrito($idUser);
                echo "compra exitosa";
                break;
            }
        case '6': //contador del carrito
            $contador = $carrito->carritosContador($_SESSION["id_usuario"]);
            echo '' . $contador;
            break;

        case '7':
            if ($_SESSION['id_rol'] == 1) {
                echo 'id_rol=' . $_SESSION['id_rol'];
                echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <img src="../assets/img/OIG.jpeg" alt="Logo" width="80" height="80" class="d-inline-block align-top imagen-redondeada">
                <a class="navbar-brand" href="#"><img height="100" src="/HTML/Carpeta2/assets/imagenes/logo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#"><img src="../assets/img/work-from-home.png" alt="" height="30">
                                Inicio <span class="sr-only">(current)</span></a>
                        </li>
    
                    </ul>
                    <form class="form-inline">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit"> <img src="../assets/img/www.png" alt="" height="30"></button>
                    </form>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="../view/a.php"><img src="../assets/img/hombre.png" alt="" height="30"></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="SubirVideo.html"><img src="../assets/img/subir.png" alt="subir" height="30px"></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../html/configuracion.html"><img src="../assets/img/configuraciones.png" alt="" height="30"></a>
                        </li>
                        <li class="nav-item">
    
                            <!-- <a class="nav-link" href="carrito.php" id="contador"><img src="../assets/img/work-from-home.png" alt=""
                                    height="30">
                            </a>-->
                            <a class="nav-link" href="carrito.php" id="contador">
                                <div class="carrito-container">
                                    <img src="../assets/img/carrito-de-compras.png" alt="" height="30">
                                    <!--el contador value se usa mas que nada el value para obtener los valores del id que se llama contador-->
                                    <span id="contador-value"></span>
                                </div>
                            </a>
                        </li>
    
                        <li class="nav-item active">
    
                            <a class="nav-link" href="../Controladores/ctrlCerrarSesion.php"><img src="../assets/img/flecha.png" alt="" height="30">
                                cerraar sesion <span class="sr-only">(current)</span></a>
                        </li>
                    </ul>
                </div>
            </nav>';
            } else if ($_SESSION['id_rol'] == 2) {
                echo $_SESSION['id_rol']; ///trer la barra de navegacion
                echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <img src="../assets/img/OIG.jpeg" alt="Logo" width="80" height="80" class="d-inline-block align-top imagen-redondeada">
                <a class="navbar-brand" href="#"><img height="100" src="/HTML/Carpeta2/assets/imagenes/logo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#"><img src="../assets/img/work-from-home.png" alt="" height="30">
                                Inicio <span class="sr-only">(current)</span></a>
                        </li>
    
                    </ul>
                    <form class="form-inline">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit"> <img src="../assets/img/www.png" alt="" height="30"></button>
                    </form>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="../html/p2.php"><img src="../assets/img/hombre.png" alt="" height="30"></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../view/historialCompras.php"><img src="../assets/img/subir.png" alt="subir" height="30px"></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../html/configuracion.html"><img src="../assets/img/configuraciones.png" alt="" height="30"></a>
                        </li>
                        <li class="nav-item">
    
                            <!-- <a class="nav-link" href="carrito.php" id="contador"><img src="../assets/img/work-from-home.png" alt=""
                                    height="30">
                            </a>-->
                            <a class="nav-link" href="carrito.php" id="contador">
                                <div class="carrito-container">
                                    <img src="../assets/img/carrito-de-compras.png" alt="" height="30">
                                    <!--el contador value se usa mas que nada el value para obtener los valores del id que se llama contador-->
                                    <span id="contador-value"></span>
                                </div>
                            </a>
                        </li>
    
                        <li class="nav-item active">
    
                            <a class="nav-link" href="../Controladores/ctrlCerrarSesion.php"><img src="../assets/img/flecha.png" alt="" height="30">
                                cerraar sesion <span class="sr-only">(current)</span></a>
                        </li>
                    </ul>
                </div>
            </nav>';
            }
            break;

        case '8': ///footer
            echo '
    <footer class="footer-section">
        <div class="container">
            <div class="footer-cta pt-5 pb-5">
                <div class="row">
                    <div class="col-xl-4 col-md-4 mb-30">
                        <div class="single-cta">
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="cta-text">
                                <h4>UBICACION</h4>
                                <span>Avenida Tecnologico</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4 mb-30">
                        <div class="single-cta">
                            <i class="fas fa-phone"></i>
                            <div class="cta-text">
                                <h4>Contactanos</h4>
                                <span>+52 4111549487</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4 mb-30">
                        <div class="single-cta">
                            <i class="far fa-envelope-open"></i>
                            <div class="cta-text">
                                <h4>Correo</h4>
                                <span>deco.tecno@itcelaya.edu.mx</span>
                            </div>
                            <div class="cta-text">
                            <h4>Correo</h4>
                            <span>deco.tecno@itcelaya.edu.mx</span>
                        </div>
                        
                        </div>
                    </div>
                </div>
                <main>
                <div class="footer-content pt-5 pb-5">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 mb-50">
                        <div class="footer-widget">
                            <div class="footer-logo">
                                <a href="index.html"><img src="../assets/img/OIG.jpeg" class="img-fluid" alt="logo"></a>
                            </div>
                            <div class="footer-text">
                                <p>"Empoderamos tu potencial a través del aprendizaje en línea, impulsando tu éxito
                                    y
                                    transformando tu futuro, porque el conocimiento no tiene límites ni fronteras.
                                    Únete
                                    a nuestra comunidad de estudiantes y descubre un mundo de posibilidades
                                    educativas
                                    desde la comodidad de tu hogar."</p>
                            </div>
                            <div class="footer-social-icon">
                                <span>Follow us</span>
                                <a href="#"><img src="../assets/img/facebook.png" alt="Logo" width="80" height="80" class="d-inline-block align-top"></a>
                                <a href="#"><img src="../assets/img/gorjeo.png" alt="Logo" width="80" height="80" class="d-inline-block align-top"></a>
                                <a href="#"><img src="../assets/img/instagram.png" alt="Logo" width="80" height="80" class="d-inline-block align-top"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                        <div class="footer-widget">
                            <div class="footer-widget-heading">
                                <h3>Useful Links</h3>
                            </div>
                            <ul>
                                <li><a href="/index.html">Home</a></li>
                                <li><a href="#">about</a></li>
                                <li><a href="#">services</a></li>
                                <li><a href="#">portfolio</a></li>
                                <li><a href="#">Contact</a></li>
                                <li><a href="#">About us</a></li>
                                <li><a href="#">Our Services</a></li>
                                <li><a href="#">Expert Team</a></li>
                                <li><a href="#">Contact us</a></li>
                                <li><a href="#">Latest News</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-50">
                        <div class="footer-widget">
                            <div class="footer-widget-heading">
                                <h3>SIGUENOS</h3>
                            </div>
                            <div class="footer-text mb-25">
                                <p>No olvides que este es tu santuario de conocimiento y siempre serás bienvenido
                                </p>
                            </div>
                            <div class="subscribe-form">
                                <form action="#">
                                    <input type="text" placeholder="Email Address">
                                    <button><i class="fab fa-telegram-plane"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 text-center text-lg-left">
                        <div class="copyright-text">
                            <p>Copyright &copy; 2018, All Right Reserved <a href="https://codepen.io/anupkumar92/">Anup</a></p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 d-none d-lg-block text-right">
                        <div class="footer-menu">
                            <ul>
                                <li><a href="../index.html">Home</a></li>
                                <li><a href="#">Terms</a></li>
                                <li><a href="#">Privacy</a></li>
                                <li><a href="#">Policy</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                </main>
    </footer>
    ';
        case '9': //imprimir pdf
            $id_venta = isset($_GET['id_venta']) && isset($_GET['fecha']) ? $_GET['id_venta'] : NULL;
            $fecha = isset($_GET['fecha']) ? $_GET['fecha'] : NULL;

            // $fecha = $_GET['fecha'];
            //echo $fecha."  ".$_SESSION["id_usuario"]." ".$id_venta;

            $imprimir->crearPDF($_SESSION["id_usuario"], $fecha);
            exit;



        case '10':
            if (isset($_SESSION["id_usuario"])) {
                $venta = $mostrarVenta->MostrarCompras($_SESSION["id_usuario"]);
                echo '<div class="curso-grid">';
                foreach ($venta as $curso) {
                    echo '
                    <div class="curso-card">
                        <p class="display-1 pt-2 nombre-pro">compra del usuario= ' . $curso['nombre'] . '</p>
                        <p class="cat-origen pb-1">compra del dia=' . $curso['fecha'] . '</p>
                        <p class="cat-origen pb-1">idventa=' . $curso['id_venta'] . '</p>
                        <input type="button" class="btn btn-danger" value="imprimir" onclick="imprimir()">
                        <a href="../controller/user/ctrlUser.php?opc=9&id_venta=' . $curso['id_venta'] . '&fecha=' . $curso['fecha'] . '" target="_blank">aaaaa</a>
                        
                   </div>';
                }
                echo '</div>';
            } else {
                echo "El usuario no está definido";
            }
    }
}
