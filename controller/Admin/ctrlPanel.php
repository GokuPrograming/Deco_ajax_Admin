<?php
require_once '../../model/model_cursos.php';
require_once '../../model/conexion.php';
require_once '../../model/carrito.php';
require_once '../../model/adminPanel.php';
require_once '../../adodb5/adodb.inc.php';
$content = 'Este es el contenido del panel administrador';

// Devuelve el contenido como respuesta
//echo $content;

$mostrar = new model_cursos();
$carrito = new carrito();
$adminPanel = new admin_panel();
//echo 'llego al controlador';
if (isset($_GET['opc'])) {
    $opc = $_GET['opc'];
    //echo ($opc);
    switch ($opc) {
        case 1: //traer usuarios tops
            if (isset($_SESSION["id_usuario"])) {
                $a = $_SESSION["id_usuario"];
                $usuario = $adminPanel->usuariosTOP();
                $contador = 1;
                echo '<h2>usuarios TOP</h2>
                    <table> 
                        <tr> 
                            <th>pocision</th>
                            <th>cantidad</th>
                            <th>Email</th>
                            <th>Enviar Agradecimiento</th>
                        </tr>';

                foreach ($usuario as $usuarioTOP) {
                    echo '<tr>
                              <td>' . $contador . '</td>
                              <td>' . $usuarioTOP['cantidad'] . '</td>
                              <td>' . $usuarioTOP['correo'] . '</td>
                             <td> <input type="button" class="btn btn-danger" value="ENVIAR FELICITACION" onclick="enviarCorreo(' . $usuarioTOP['correo'] . ')"></td>

                          </tr>';
                    $contador++;
                }

                echo '</table>';
                exit;
            }


        case 2: ///mostrar Todos los usuarios
            if (isset($_SESSION["id_usuario"])) {
                $usuarioT = $adminPanel->usuariosTodos();
                echo
                '<h2>Administración de Usuarios</h2>
                <table> 
                <tr> 
                    <th>ID</th>
                    <th>cantidad</th>
                    <th>Email</th>
                    <th>Enviar Agradecimiento</th>
                </tr>';

                foreach ($usuarioT as $usuarioT) {
                    echo '<tr>
                      <td>' .  $usuarioT['id_usuario'] . '</td>
                      <td>' . $usuarioT['rol'] . '</td>
                      <td>' . $usuarioT['correo'] . '</td>
                     <td> <input type="button" class="btn btn-danger" value="modificar ROL" onclick="modificarRol(' . $usuarioT['rol'] . ')"></td>

                  </tr>';
                }
                echo '</table>';

                exit(); // Termina la ejecución después de enviar los datos
            }
            break;
        case 3: //cursos top
            if (isset($_SESSION["id_usuario"])) {
                $cursos = $adminPanel->listaDeloMasVendido();
                echo
                '<h2>LOS CURSOS MAS VALORADOS</h2>
                <table> 
                <tr> 
                    <th>titulo</th>
                    <th>cantidad</th>

                </tr>';

                foreach ($cursos as $curso) {
                    echo '<tr>
                      <td>' .  $curso['titulo'] . '</td>
                      <td>' . $curso['cantidad'] . '</td>
                   

                  </tr>';
                }
                echo '</table>';
                exit(); // Termina la ejecución después de enviar los datos

            }
            case 4:
                if (isset($_SESSION["id_usuario"])) {
                    echo '<form method="post" action="../controller/Admin/ctrlPanel.php?opc=1">
                            <input type="text" id="fecha_inicial" class="fadeIn third" name="fecha_inicial" placeholder="Fecha inicial" required>
                            <input type="text" id="fecha_nacimiento" class="fadeIn third" name="fecha_nacimiento" placeholder="Fecha de Nacimiento" required>
                            <input type="hidden" name="opc" value="4"> <!-- Campo oculto para la opción -->
                            <input type="submit" class="fadeIn fourth" value="Registrarse" required>
                          </form>';
                }
                break;
            
    }
}
