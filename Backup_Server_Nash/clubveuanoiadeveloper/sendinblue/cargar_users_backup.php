<?php
// Define los datos del usuario que deseas agregar
$user_data = array(
    "email" => "pavo6@ejemplo.com",
    "attributes" => array(
          "NOMBRE" => "Albert",
          "APELLIDOS" => "Escobar"
      )
  );

// Convierte los datos en formato JSON
$json_data = json_encode($user_data);

// Define la URL de la API de Sendinblue
$url = "https://api.sendinblue.com/v3/contacts";

// Define las cabeceras de la solicitud
$headers = array(
    "Content-Type: application/json",
    "api-key: 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"
);

// Inicializa la solicitud curl
$ch = curl_init();

// Configura la solicitud curl
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

// Envía la solicitud curl y obtiene la respuesta
$response = curl_exec($ch);

// Cierra la solicitud curl
curl_close($ch);

// Analiza la respuesta JSON
$result = json_decode($response);

// Verifica si se agregó correctamente el usuario
if ($result->code == "success") {
    echo "El usuario se agregó correctamente a Sendinblue";
} else {
    echo "Se produjo un error al agregar el usuario a Sendinblue";
}

?>
