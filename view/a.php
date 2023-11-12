<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <title>Panel de Administrador</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    header {
      background-color: #333;
      color: #fff;
      padding: 10px;
      text-align: center;
    }

    nav {
      background-color: #eee;
      padding: 10px;
    }

    nav a {
      text-decoration: none;
      color: #333;
      padding: 10px;
      margin-right: 10px;
      border-radius: 5px;
      transition: background-color 0.3s;
    }

    nav a:hover {
      background-color: #ddd;
    }

    section {
      padding: 20px;
    }

    table {
      border-collapse: collapse;
      width: 100%;
    }

    table,
    th,
    td {
      border: 1px solid #ddd;
    }

    th,
    td {
      padding: 10px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
    }

    footer {
      background-color: #333;
      color: #fff;
      text-align: center;
      padding: 10px;
      position: fixed;
      bottom: 0;
      width: 100%;
    }

    /* Estilos específicos para la gráfica */
    #MiGrafica {
      max-width: 300px;
      /* Ancho máximo del canvas */
      max-height: 200px;
      /* Altura máxima del canvas */
      margin: 10px;
      /* Márgenes para separar la gráfica de otros elementos */
    }
  </style>
</head>

<body>

  <header>
    <h1>Panel de Administrador</h1>
  </header>

  <nav>
    <a href="#" onclick="cambiarContenido('usuarios')">Usuarios</a>
    <a href="#" onclick="cambiarContenido('usuarios-top')">Usuarios Top</a>
    <a href="#" onclick="cambiarContenido('cursos')">Cursos Valorados</a>
    <a href="g.html" onclick="cambiarContenido('graficas')">Gráficas</a>
  </nav>
  <div id="">
    <section id="contenido">
      <!-- Contenido de la sección (se actualizará dinámicamente) -->
      <h2>Bienvenido al Panel de Administrador</h2>
      <p>Selecciona una opción en la barra de navegación.</p>
    </section>
    <canvas id="MiGrafica"></canvas>


  </div>

  <footer>
    <p>&copy; 2023 Panel de Administrador</p>
  </footer>

  <script>
    function modificarUsuario() {
      $.ajax({
        type: "GET",
        url: "../controller/Admin/ctrlPanel.php?opc=2",
        data: {},
        success: function(data) {
          $('#contenido').html(data);
        }
      });

    }

    function usuarios_top() {
      $.ajax({
        type: "GET",
        url: "../controller/Admin/ctrlPanel.php?opc=1",
        data: {},
        success: function(data) {
          $('#contenido').html(data);
        }
      });
    }

    function cursos_top() {
      $.ajax({
        type: "GET",
        url: "../controller/Admin/ctrlPanel.php?opc=3",
        data: {},
        success: function(data) {
          $('#contenido').html(data);
        }
      });
    }

    function Correo(usuario, contador) {
      console.log("ID de User:", usuario);
      console.log("contador:", contador);
      $.ajax({

        //  $usuario = $_GET['usuario'];
        //$contador = $_GET['contador'];
        type: "GET",
        url: "../controller/Admin/ctrlPanel.php?opc=6",
        data: {
          usuario: usuario,
          contador: contador
        },
        success: function(data) {
          console.log('ya acabo');
          $('#contenido').html(data);
        }

      });
      usuarios_top();
    }


    function actualizarRolUsuario(id_usuario, id_rol) {
      console.log("ID de Usuario:", id_usuario);
      console.log("ID de Usuario:", id_rol);
      $.ajax({
        type: "GET",
        url: "../controller/Admin/ctrlPanel.php?opc=4",
        data: {
          id_usuario: id_usuario,
          id_rol: id_rol
        },
        success: function(data) {
          console.log("Respuesta del servidor:", data);
          $('#a').html(data);


        },
        error: function(error) {
          console.error('Error en la petición AJAX:', error);
        }
      });
      modificarUsuario();
    }



    function cambiarContenido(opcion) {
      var contenido = document.getElementById('contenido');

      switch (opcion) {
        case 'usuarios':
          modificarUsuario();
          break;

        case 'usuarios-top':
          usuarios_top();
          break;

        case 'cursos':
          cursos_top();
          break;

        case 'graficas':
          //grafica();
          break;

        default:
          contenido.innerHTML =
            '<h2>Bienvenido al Panel de Administrador</h2><p>Selecciona una opción en la barra de navegación.</p>';
      }
    }
  </script>

</body>

</html>