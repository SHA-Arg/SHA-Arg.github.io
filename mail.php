<?php

use PHPMailer\PHPMailer\PHPMailer;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.html');
}

require 'phpmailer/PHPMailer.php';
require 'phpmailer/Exception.php';


$nombre = $_POST['name'];
$email = $_POST['email'];
$mensaje = $_POST['message'];
$telefono = $_POST['phone'];

if (empty(trim($nombre))) $nombre = "Anónimo";
if (empty(trim($asunto))) $asunto = "Sin asunto";

$body = <<< HTML
<h1>Consulta desde la Web:</h1>
<p>De: $nombre / $email / $telefono</p>
<h1>Mensaje:</h1>
$mensaje
HTML;

$mailer = new PHPMailer();
$mailer->setFrom($email, "$nombre");
$mailer->addAddress('herniu.amaral.sebastian@gmail.com', 'SHA Dev.');
$mailer->msgHTML($body);
$mailer->AltBody = strip_tags($body);
$rta = $mailer->send();

var_dump($rta);

header('Location: index.html');
