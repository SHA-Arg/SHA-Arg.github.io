<?php

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('Location: index.html');
}


$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$mensaje = $_POST['mensaje'];

// Remitente del mensaje (nombre y email)
// Asunto del mensaje
// Cuerpo o contenido del mensaje

var_dump($nombre);
$respuesta = mail('se_hereu@yahoo.com.ar', "Mensaje de Portfolio: $nombre", $mensaje, "From: $email");
var_dump($respuesta);
