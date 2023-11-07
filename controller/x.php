<?php
require_once '../model/usuario.php';
require_once '../model/conexion.php';

// Comprobar si se recibió una solicitud POST para iniciar sesión
$rolUser=$_SESSION['id_rol'];
if ($rolUser == 2) {
    $rolUser = 'user';
}else if($rolUser == 1) {
    $rolUser = 'admin';
}else {
    $rolUser = 'NE';
}
echo json_encode(array('error' => false, 'tipo' => $rolUser));
?>
