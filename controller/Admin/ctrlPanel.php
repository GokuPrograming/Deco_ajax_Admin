<?php
require_once '../../model/model_cursos.php';
require_once '../../model/conexion.php';
require_once '../../model/carrito.php';
require_once '../../model/adminPanel.php';
require_once '../../adodb5/adodb.inc.php';
$content = 'Este es el contenido del panel administrador';
$data = array("2023-10-11" => 12, "Ron" => 39);

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


        case 2: // Mostrar todos los usuarios
            if (isset($_SESSION["id_usuario"])) {
                $usuarios = $adminPanel->usuariosTodos();
                $roles = $adminPanel->traerRol();

                echo '<h2>Administración de Usuarios</h2>';
                echo '<table>';
                echo '<tr>
                                <th>ID</th>
                                <th>Rol</th>
                                <th>Email</th>
                                <th>Enviar Agradecimiento</th>
                              </tr>';

                foreach ($usuarios as $usuario) {
                    echo '<tr>
                                    <td>' .  $usuario['id_usuario'] . '</td>
                                    <td>' . $usuario['rol'] . '</td>
                                    <td>' . $usuario['correo'] . '</td>
                                    <td>
                                        <form id="miFormulario' . $usuario['id_usuario'] . '">
                                            <label for="select">Selecciona una opción:</label>
                                            <select id="select_' . $usuario['id_usuario'] . '" name="select">
                                                <option value="">-- Selecciona --</option>';
                    foreach ($roles as $usuarioR) {
                        echo '<option value="' . $usuarioR['id_rol'] . '">' . $usuarioR['rol'] . '</option>';
                    }
                    echo '</select>
                            <input type="button" value="Enviar" onclick="actualizarRolUsuario(\'' . $usuario['id_usuario'] . '\', document.getElementById(\'select_' . $usuario['id_usuario'] . '\').value)">
                       ';
                    echo '
                            </form>
                                    </td>
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

        case 4: // Actualizar rol
            $usuario = $_GET['id_usuario'];
            $rol = $_GET['id_rol'];

            //echo 'holaaa    usuario= ' . $usuario . 'rol=' . $rol;
        
            if ($adminPanel->actualizarRolUsuario($usuario, $rol)) {
                echo "Actualización exitosa.";
            } else {
                echo "Error al actualizar el rol.";
            }
            

            break;
        case 5: //graficas
            // Realiza la lógica para la opción 5 (por ejemplo, llama a tu función graficaVentaPeriodo)
            if (isset($_POST['fechaInicio']) && isset($_POST['fechaFinal'])) {
                $fechaInicio = $_POST['fechaInicio'];
                $fechaFinal = $_POST['fechaFinal'];

                // Llama a tu función para obtener los datos
                $datos = $adminPanel->graficaVentaPeriodo($fechaInicio, $fechaFinal);

                // Devuelve los datos en formato JSON
                header('Content-Type: application/json');
                echo json_encode($datos);
                exit;
            } else {
                // Manejo de error si las fechas no están presentes en la solicitud
                echo json_encode(['error' => 'Fechas no proporcionadas']);
                exit;
            }
            break;

            // Otros casos para diferentes opciones si es necesario

        default:
            // Manejo de error si la opción no es válida
            echo json_encode(['error' => 'Opción no válida']);
            exit;
    }
} else {
    // Manejo de error si la opción no está presente en la solicitud
    echo json_encode(['error' => 'Opción no proporcionada']);
    exit;
}
