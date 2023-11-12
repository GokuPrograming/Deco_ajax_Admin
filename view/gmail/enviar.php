<?php


// Cargar la biblioteca PHPMailer
require '../../PHPMailer/src/Exception.php';
require '../../PHPMailer/src/PHPMailer.php';
require '../../PHPMailer/src/SMTP.php';
require("../../vendor/autoload.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// Recibir los valores del formulario
$correo = $_POST['correo'];
$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];

// Inicializa la variable $mail
$mail = new PHPMailer(true);

try {
    // Configuración del servidor SMTP de Gmail
    $mail->SMTPDebug = SMTP::DEBUG_SERVER; // Desactiva la salida de depuración (puedes cambiarlo según tus necesidades)
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com'; // Servidor SMTP de Gmail
    $mail->SMTPAuth   = true;
    $mail->Port       = 587; // Puerto SMTP de Gmail
    $mail->Username   = 'deco14m@gmail.com'; // Tu dirección de correo de Gmail
    $mail->Password   = 'sjljmtsfuudrfvmq'; // Tu contraseña de Gmail
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Habilita el cifrado TLS

    // Configuración de los destinatarios y contenido del correo
    $mail->setFrom('verafrancomiguel1d@gmail.com', 'Miguel'); // Tu dirección de correo y tu nombre
    $mail->addAddress('deco14m@gmail.com', 'Nombre Destinatario'); // Dirección de correo del destinatario y su nombre
    $mail->isHTML(true);
    $mail->Subject = 'asdasdasdasdasd';
    $mail->Body    = "dsasdasdas";
    $mail->AltBody = 'Este es el cuerpo del correo en texto plano para clientes de correo no HTML';

    // Envía el correo
    $mail->send();
    echo 'El mensaje ha sido enviado';
} catch (Exception $e) {
    echo "No se pudo enviar el mensaje. Error del remitente: {$mail->ErrorInfo}";
}
