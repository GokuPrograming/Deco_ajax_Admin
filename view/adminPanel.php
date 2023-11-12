<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/adminPanel.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <title>Panel Administrativo</title>
  <script>
    function recargarPagina() {
      $.ajax({
        type: "GET",
        url: "../controller/Admin/ctrlPanel.php?opc=1",
        data: {},
        success: function(data) {
          $('#stats').html(data);
        }
      });
    }

    
  </script>
</head>

<body>

  <div class="admin-panel clearfix">
    <div class="slidebar">
      <div class="logo">
        <a href=""></a>
      </div>
      <ul>
        <li><a href="#dashboard" id="targeted">dashboard</a></li>
        <li><a href="#posts">posts</a></li>
        <li><a href="#media">media</a></li>
        <li><a href="#pages">pages</a></li>
        <li><a href="#links">links</a></li>
        <li><a href="#comments">comments</a></li>
        <li><a href="#widgets">widgets</a></li>
        <li><a href="#plugins">plugins</a></li>
        <li><a href="#users">users</a></li>
        <li><a href="#tools">tools</a></li>
        <li><a href="#settings">settings</a></li>
      </ul>
    </div>
    <div class="main">

      <div class="mainContent clearfix">
        <div id="dashboard">
          <h2 class="header"><span class="icon"></span>Dashboard</h2>
          <div id="stats">


          </div>
        </div>
        <div id="posts">
          <h2 class="header">
ewqeweq
          </h2>
          <p id="a"></p>
          <form action=""> <input type="button" class="btn btn-danger" value="Comprar" onclick="Correo()">
          </form>

        </div>
        <div id="media">

        </div>


        <div id="pages">
          <h2 class="header">pages</h2>
          <!-- Aquí se cargarán los datos con Ajax -->
          <table id="usuariosTable">
            <thead>
              <tr>
                <th>Correo</th>
                <th>Rol</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>

        <div id="links">
          <h2 class="header">links</h2>
        </div>
        <div id="comments">
          <h2 class="header">comments</h2>
        </div>
        <div id="widgets">
          <h2 class="header">widgets</h2>
        </div>
        <div id="plugins">
          <h2 class="header">plugins</h2>
        </div>
        <div id="users">

        </div>
        <div id="tools">
          <h2 class="header">tools</h2>
        </div>
        <div id="a"></div>
      </div>
      <ul class="statusbar">
        <li><a href=""></a></li>
        <li><a href=""></a></li>
        <li class="profiles-setting"><a href="">s</a></li>
        <li class="logout"><a href="">k</a></li>
      </ul>
    </div>
  </div>
</body>

</html>
<script>
  /* $(document).ready(function() {
    recargarPagina();
    usuarioT();
  });recargarPagina*/
  $(document).ready(function() {
    // Utilizamos Ajax para obtener los datos de usuarios
    $.ajax({
      url: '../controller/Admin/ctrlPanel.php?opc=2', // Reemplaza con la ruta correcta a tu archivo PHP
      type: 'GET', // Cambia a POST si tu servidor espera un método POST
      data: {}, // Datos adicionales que puedas necesitar enviar
      dataType: 'json',
      success: function(data) {
        // Limpiamos el contenido actual del contenedor
        $('#pages').empty();

        // Iteramos sobre los datos y agregamos elementos <div>
        $.each(data, function(index, usuario) {
          $('#pages').append('<div>' + usuario.correo + usuario.rol + '</div>');
        });
      },
      error: function(error) {
        console.log('Error al obtener datos de usuarios:', error);
      }
    });
    recargarPagina();
  });
</script>