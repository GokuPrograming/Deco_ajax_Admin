<?php
session_start();
if (isset($_SESSION['id_usuario'])) {
    header('location: view/main.php');
    // You may want to remove this echo statement unless it's for debugging purposes
    // echo "sesion" . $_SESSION['id_usuario'];
} else {
    //echo "Sesión no iniciada";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--hoja  de estilos-->
    <link rel="stylesheet" href="assets/CSS/estilos.css">
    <!--header hero-->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!--texta alaig-->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
   <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: "experimentos/ContadorAJAX/conexion.php", // Ruta al archivo de servidor
                type: "GET",
                success: function(data) {
                    $("#contador").text("Total: " + data); // Muestra el valor en la barra de navegación
                }
            });
        });
    </script>-->


    <!------ Include the above in your HEAD tag ---------->


    <!------ Include the above in your HEAD tag ---------->


    <!--usar el nvar boostrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>DECO</title>

</head>


<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
            <img src="assets/img/OIG.jpeg" alt="Logo" width="80" height="80"
                class="d-inline-block align-top imagen-redondeada">

            <!--src="https://d1yjjnpx0p53s8.cloudfront.net/styles/logo-thumbnail/s3/0022/4736/brand.gif?itok=QRK3Br9L" -->
            <a class="navbar-brand" href="#"><img height="100" src="/HTML/Carpeta2/assets/imagenes/logo.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#"><img src="assets/img/work-from-home.png" alt="" height="30"> Inicio
                            <span class="sr-only">(current)</span></a>
                    </li>
                </ul>


                <ul class="navbar-nav mr-auto">

                </ul>
                <ul class="navbar-nav mr-auto">

                </ul>
                <ul class="navbar-nav mr-auto">

                </ul>

                <ul class="navbar-nav mr-auto">

                </ul>


                <ul class="navbar-nav mr-auto">

                </ul>
                <ul class="navbar-nav mr-auto">
                </ul>
                <ul class="navbar-nav mr-auto">
                </ul>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="html/Acerca_de.html"><img src="assets/img/acerca-de.png" alt=""
                                height="30"> About Us<span class="sr-only">(current)</span></a>
                    </li>
                </ul>

                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="view/login.php"> <img src="assets/img/iniciar-sesion.png" alt=""
                                height="30">
                            Iniciar sesion <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="view/registro.html"><img src="assets/img/anadir-cuenta.png" alt=""
                                height="30"> Crear
                            una cuenta<span class="sr-only">(current)</span></a>
                    </li>

                </ul>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="mailto:verafrancomiguel1d@gmail.com"><img src="assets/img/llamada.png"
                                alt="" height="30">
                            Contactanos <span class="sr-only">(current)</span></a>

                    </li>
                </ul>

            </div>
        </nav>


    </header>


    <!--end nvar boostrap-->

    <!--header foto https://bootsnipp.com/snippets/rNnjg  -->

    <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active"> <img src="assets/img/desarrollador-web.jpg" width=""
                    class="d-block w-100" alt="...">
                <div class="background-overlay"></div>
                <div class="carousel-caption">
                    <h5 class="display-4 h4-md mb-4 font-weight-bold">APRENDE PROGRAMACION</h5>
                    <p class="h4 mb-5 pb-3 text-white-100">Superate a ti mismo y desmuestrate que tan bueno puedes
                        llegar
                        a ser</p>
                    <a href="html/login.html" class="btn btn-lg btn-danger">Iniciar sesion</a>
                </div>
            </div>
            <div class="carousel-item"> <img src="assets/img/comme-un-chef-07-03-2012-2-g-780x470.webp"
                    class="d-block w-100" alt="...">
                <div class="background-overlay"></div>
                <div class="carousel-caption">
                    <h5 class="display-4 mb-4 font-weight-bold">APRENDE NUEVAS RECETAS</h5>
                    <p class="h4 mb-5 pb-3 text-white-100">conviertete en un chef profesional con nuestros cursos</p>
                    <a href="html/login.html" class="btn btn-lg btn-danger">Iniciar sesion</a>
                </div>
            </div>
            <div class="carousel-item"> <img src="assets/img/Stratovarius-2.jpg" class="d-block w-100" alt="...">
                <div class="background-overlay"></div>
                <div class="carousel-caption">
                    <h5 class="display-4 mb-4 font-weight-bold">CONVIERTETE EN UN MUSICO EXPERTO </h5>
                    <p class="h4 mb-5 pb-3 text-white-100">Haz tus sueños realidad</p>
                    <a href="html/login.html" class="btn btn-lg btn-block">Iniciar Sesion</a>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev"> <span
                class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next"> <span
                class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
    </div>
    <!--End header foto-->

    <!-- area de explicacion https://bootsnipp.com/snippets/O54eO -->
    <div class="how-section1 blackBack">
        <div class="row">
            <div class="col-md-6 how-img">
                <img src="https://image.ibb.co/dDW27U/Work_Section2_freelance_img1.png" class="rounded-circle img-fluid"
                    alt="" />
            </div>
            <div class="col-md-6">
                <h4>Aprende</h4>
                <h4 class="subheading blackText">En nuestro emocionante viaje educativo, te invitamos a explorar y
                    nutrir tu lado
                    creativo. Descubre nuevas perspectivas, experimenta con ideas audaces y amplía tus horizontes.
                    ¡Aprende con nosotros y despierta la fuerza de tu creatividad! El mundo está lleno de oportunidades
                    esperando a ser descubiertas por mentes creativas como la tuya</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h4>Creatividad</h4>
                <h4 class="subheading blackText">¿Has sentido la chispa de la creatividad dentro de ti? Es hora de
                    dejarla
                    brillar. Descubre un mundo de posibilidades ilimitadas mientras exploras tu creatividad. Desde el
                    arte hasta la innovación, tus ideas únicas pueden cambiar todo. No esperes más, únete a nosotros y
                    desbloquea tu potencial creativo. ¡El mundo está esperando tu toque creativo</h4>

            </div>
            <div class="col-md-6 how-img">
                <img src="https://image.ibb.co/cHgKnU/Work_Section2_freelance_img2.png" class="rounded-circle img-fluid"
                    alt="" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 how-img">
                <img src="https://image.ibb.co/ctSLu9/Work_Section2_freelance_img3.png" class="rounded-circle img-fluid"
                    alt="" />
            </div>
            <div class="col-md-6">
                <h4>Descubre</h4>
                <h4 class="subheading">En nuestro viaje de descubrimiento, encontrarás un mundo lleno de maravillas y
                    secretos por desvelar. Cada día es una oportunidad para aprender algo nuevo, explorar terrenos
                    desconocidos y hacer tus propios descubrimientos. Así que, ¿estás listo para embarcarte en esta
                    emocionante aventura de aprendizaje y descubrimiento? ¡Únete a nosotros y descubre un universo de
                    conocimiento esperando ser explorado!
                    to:</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h4>¡EXITO!</h4>
                <h4 class="subheading">Convierte tus sueños en logros empresariales con nuestro programa de desarrollo.
                    ¡Hazlo realidad hoy!</h4>

            </div>
            <div class="col-md-6 how-img">
                <img src="https://image.ibb.co/gQ9iE9/Work_Section2_freelance_img4.png" class="rounded-circle img-fluid"
                    alt="" />
            </div>
        </div>
    </div>
    <!--  -->
    <!--footer    https://codepen.io/baahubali92/pen/KbRBxJ -->
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
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-content pt-5 pb-5">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 mb-50">
                        <div class="footer-widget">
                            <div class="footer-logo">
                                <a href="index.html"><img src="assets/img/OIG.jpeg" class="img-fluid" alt="logo"></a>
                            </div>
                            <div class="footer-text">
                                <p>"Empoderamos tu potencial a través del aprendizaje en línea, impulsando tu éxito y
                                    transformando tu futuro, porque el conocimiento no tiene límites ni fronteras. Únete
                                    a nuestra comunidad de estudiantes y descubre un mundo de posibilidades educativas
                                    desde la comodidad de tu hogar."</p>
                            </div>
                            <div class="footer-social-icon">
                                <span>Follow us</span>
                                <a href="#"><img src="assets/img/facebook.png" alt="Logo" width="80" height="80"
                                        class="d-inline-block align-top"></a>
                                <a href="#"><img src="assets/img/gorjeo.png" alt="Logo" width="80" height="80"
                                        class="d-inline-block align-top"></a>
                                <a href="#"><img src="assets/img/instagram.png" alt="Logo" width="80" height="80"
                                        class="d-inline-block align-top"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                        <div class="footer-widget">
                            <div class="footer-widget-heading">
                                <h3>Useful Links</h3>
                            </div>
                            <ul>
                                <li><a href="#">Home</a></li>
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
                                <p>No olvides que este es tu santuario de conocimiento y siempre serás bienvenido</p>
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
                            <p>Copyright &copy; 2018, All Right Reserved <a
                                    href="https://codepen.io/anupkumar92/">Anup</a></p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 d-none d-lg-block text-right">
                        <div class="footer-menu">
                            <ul>
                                <li><a href="#">Home</a></li>
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
    </footer>

</body>

</html>
</body>

</html>