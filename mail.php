<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('Location: index.html');
    exit;
}

$nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$asunto = isset($_POST['asunto']) ? trim($_POST['asunto']) : '';
$mensaje = isset($_POST['mensaje']) ? trim($_POST['mensaje']) : '';

// Validar que todos los campos están completos
if (empty($nombre) || empty($email) || empty($asunto) || empty($mensaje)) {
    die('Todos los campos son obligatorios.');
}

// Validar formato del email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die('Dirección de correo no válida.');
}

// Sanitizar datos
$nombre = htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8');
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$asunto = htmlspecialchars($asunto, ENT_QUOTES, 'UTF-8');
$mensaje = htmlspecialchars($mensaje, ENT_QUOTES, 'UTF-8');

// Encabezados
$headers = "From: $email\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

// Enviar el correo
$respuesta = mail('', "Mensaje de Portfolio: $asunto", $mensaje, $headers);

if ($respuesta) {
    echo 'Correo enviado exitosamente.';
} else {
    echo 'Error al enviar el correo.';
}
