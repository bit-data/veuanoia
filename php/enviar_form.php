<?php
if(isset($_POST['email'])) {

//email i subject
$email_to = "info@bit-data.es";
$email_subject = "App club subscriptor";

// Validació camps formulari
if(!isset($_POST['nom_cognoms']) ||
//!isset($_POST['cognoms']) ||
!isset($_POST['email']) ||
//!isset($_POST['telephone']) ||
!isset($_POST['comentari'])) {

// resposta error formulari
// echo "<b>Ocurrió un error y el formulario no ha sido enviado. </b><br />";
header("Location: email_no_enviat.html");
die();
}

//Cos email
$email_message = "Infromació del formulari de contacte:\n\n";
$email_message .= "Subscriptor/a: " . $_POST['nom_cognoms'] . "\n";
//$email_message .= "Apellido: " . $_POST['last_name'] . "\n";
$email_message .= "E-mail: " . $_POST['email'] . "\n";
//$email_message .= "Teléfono: " . $_POST['telephone'] . "\n";
$email_message .= "Comentarios: " . $_POST['comentari'] . "\n\n";

// Enviament de l'email
$email_from = $_POST['email'];
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);

//missatge d'enviament correcte
//echo "¡El formulario se ha enviado con éxito!";
header("Location: email_enviat.html");
}
?>
