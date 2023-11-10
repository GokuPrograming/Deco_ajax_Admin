<?php
require_once '../../model/model_cursos.php';
require_once '../../model/conexion.php';
require_once '../../model/carrito.php';
require_once '../../adodb5/adodb.inc.php';
$content = 'Este es el contenido del panel administrador';
echo $content;
// Devuelve el contenido como respuesta
//echo $content;

$mostrar = new model_cursos();
$carrito = new carrito();
//echo 'llego al controlador';
if (isset($_GET['opc'])) {
    $opc = $_GET['opc'];
    //echo ($opc);
    switch ($opc) {
        case 1:
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
            }

            break;

        case 2: ///agregar producto a carrito
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


        case 3: ///muestra los elementos en la pagina de carrito
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
        case 4: //elimina un elemento del carrito
            if (isset($_SESSION["id_usuario"])) {
                $carrito = new carrito();
                $id_lista_cursos = $_POST['id_lista_cursos'];
                $idUser = $_SESSION["id_usuario"];
                $carrito->eliminarProcductoDeCarrito($idUser, $id_lista_cursos);
            } else {
                echo "El usuario no está definido";
            }
            break;
        case 5: ///comprarCArro
            if (isset($_SESSION["id_usuario"])) {
                $carrito = new Carrito(); // Asegúrate de que la clase Carrito esté definida
                $idUser = $_SESSION["id_usuario"];
                $carrito->comprarCarrito($idUser);
                echo "compra exitosa";
                break;
            }
        case 6: //contador del carrito
            $contador = $carrito->carritosContador($_SESSION["id_usuario"]);
            echo '' . $contador;
            break;
    }
}
?>