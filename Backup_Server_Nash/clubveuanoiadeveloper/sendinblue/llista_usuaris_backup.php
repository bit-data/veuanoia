<?php
// Definimos nuestra clave de API
$api_key = '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';

// Inicializamos cURL
$ch = curl_init();

// Configuramos las opciones de cURL
curl_setopt($ch, CURLOPT_URL, 'https://api.sendinblue.com/v3/contacts');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'api-key: ' . $api_key,
));

// Ejecutamos la solicitud
$response = curl_exec($ch);

// Procesamos la respuesta
if ($response === false) {
    // Manejamos el error
    echo 'Error en la solicitud: ' . curl_error($ch);
} else {
    // Convertimos la respuesta a un objeto PHP
    $contacts = json_decode($response);

    // Mostramos los datos de los contactos
    foreach ($contacts->contacts as $contact) {
        echo 'Nombre: ' . $contact->attributes->NOMBRE . ' ' . $contact->attributes->APELLIDOS . '<br>';
        echo 'Email: ' . $contact->email . '<br>';
    }
}

// Cerramos la conexión cURL
curl_close($ch);

 ?>
