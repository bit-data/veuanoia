<?php

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['email'])) {

//email i subject
$email_to = "info@bit-data.es";
$email_subject = "App club subscriptor";

// Validació camps formulari
if(!isset($_POST['nom_cognoms']) ||
!isset($_POST['email']) ||
!isset($_POST['comentari'])) {

// resposta error formulari
// echo "<b>Ocurrió un error y el formulario no ha sido enviado. </b><br />";
header("Location: email_no_enviat.html");
die();
}

// Crea una nova instància de PHPMailer
$mail = new PHPMailer(true);
//Codificació de caràcters
$mail->CharSet = 'UTF-8';

try {
    // Configuració del servidor SMTP i les credencials
    $mail->isSMTP();
    $mail->Host = 'bit-data-es.correoseguro.dinaserver.com'; // Servidor SMTP
    $mail->SMTPAuth = true;
    $mail->Username = $email_to; // Email que rep
    $mail->Password = '*Bit-Data19'; // Contrasenya email
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Configuració remitent i destinatari
    $mail->setFrom($_POST['email'], $_POST['nom_cognoms']);
    $mail->addAddress($email_to, 'VEU ANOIA');

    // Configura el títol i el cos del email
    $mail->isHTML(true);
    $mail->Subject = $email_subject;

    $email_message = "Informació del formulari de contacte:<br><br>";
    $email_message .= "Subscriptor/a: " . $_POST['num_sub'] . "<br>";
    $email_message .= "Nom: " . $_POST['nom_cognoms'] . "<br>";
    $email_message .= "E-mail: " . $_POST['email'] . "<br>";
    $email_message .= "Mòbil: " . $_POST['mobil'] . "<br>";
    $email_message .= "Telèfon: " . $_POST['telefon'] . "<br>";
    $email_message .= "Comentaris: " . $_POST['comentari'] . "<br><br>";

    $mail->Body = $email_message;


    // Envia el correo
    $mail->send();
    //echo 'l'email s'ha enviat correctament.';
    header("Location: email_enviat.html");
} catch (Exception $e) {
    //echo 'Error al enviar l'email: ' . $mail->ErrorInfo;
    header("Location: email_no_enviat.html");
}

}
?>
