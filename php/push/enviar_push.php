<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// URL de la API de FCM
$url = 'https://fcm.googleapis.com/fcm/send';

// Credenciales de acceso a la API (clave del servidor)
$serverKey = 'AAAAZYx9yms:APA91bH6m28my-A1xERbDzjiLKIYjK_gNrr5PJ-1yd1gDuVtQSkT93rmnlPZOhyW7ECGHvxwYx55FB4Fm3S2R3ygbS4h2W8D_M-I_TQtBpNAFXZiVON-hSb29HkBGw7Qo73QzrQDgfwh';

// Datos de la notificación
$data = [
    'to' => '/topics/VEU_ANOIA',  //  COnfigurat amb topic per enviar a tots els dispositius subscrits al tema, en cas de voler enviar a 1 dispositiu concret s'hauria d'especificar el token
    'notification' => [
        'title' => 'Emma',
        'body' => 'Guapa',
    ],
];

// Cabeceras de la solicitud HTTP
$headers = [
    'Authorization: key=' . $serverKey,
    'Content-Type: application/json',
];

// Inicializar la sesión cURL
$ch = curl_init();

// Configurar la solicitud cURL
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

// Ejecutar la solicitud y obtener la respuesta
$response = curl_exec($ch);

// Cerrar la sesión cURL
curl_close($ch);

// Mostrar la respuesta
echo $response;
?>
