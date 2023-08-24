<?php
include_once '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibir los datos del formulario
    $titol = $_POST['titol'];
    $missatge = $_POST['missatge'];
    $contrasenya = $_POST['contrasenya'];

    $sql = "SELECT id FROM firebase_push WHERE deviceid= '$contrasenya'";
    $stmt = $connection->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetchColumn();

    $connection = null;


      if ($result == 1)
      {
            // URL de la API de FCM
        $url = 'https://fcm.googleapis.com/fcm/send';

        // Credenciales de acceso a la API (clave del servidor)
        $serverKey = 'AAAAZYx9yms:APA91bH6m28my-A1xERbDzjiLKIYjK_gNrr5PJ-1yd1gDuVtQSkT93rmnlPZOhyW7ECGHvxwYx55FB4Fm3S2R3ygbS4h2W8D_M-I_TQtBpNAFXZiVON-hSb29HkBGw7Qo73QzrQDgfwh';

        // Datos de la notificación
        $data = [
            'to' => '/topics/VEU_ANOIA',  //  COnfigurat amb topic per enviar a tots els dispositius subscrits al tema, en cas de voler enviar a 1 dispositiu concret s'hauria d'especificar el token
            'notification' => [
                'title' => $titol,//'Emma',
                'body' => $missatge,//'Guapa',
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
        echo "Notificació enviada correctament!!!! FALTA FER WEB I REDIRECCIONAR";//$response;
      }//end if result

      else {

        echo "No tens permís per enviar la notificació FALTA FER WEB I REDIRECCIONAR"; //definir web d'error

      }//end else
}//ens if SERVER
?>
