<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/CSS/login.css">
    <!--header hero-->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!--texta alaig-->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <title>Document</title>
</head>

<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first">
                <img src="../assets/img/fondo.jpeg" id="icon" alt="User Icon" class="imagen-redondeada" />
                <h1>Inicia sesion</h1>
            </div>

            <!-- Login Form -->
            <form action="" id="forming" method="post">
                <input type="text" id="correo" class="fadeIn second" name="correo" placeholder="correo electronico">
                <input type="text" id="password" class="fadeIn third" name="password" placeholder="password">
                <input type="submit" class="fadeIn fourth" value="iniciar sesion">
            </form>
            <span id="error" style="display: none;">valores no validos</span>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="../js/login.js"></script>
            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover" href="../index.html">Go to the Site</a>
            </div>

        </div>
    </div>



</body>

</html>