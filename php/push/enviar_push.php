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
        $serverKey = 'AAAAi_p7mb4:APA91bHc77oCW9G5BWLgDVRwwHNzaC7DFqVfvOYMVyXgJW9alIv0ONZgRjl_XgB-O0Nz8thTe6BCRotCNLDyPOXzpI13JlQ-ghnDeAnSf66i_ehymFLYe-J-2p92BMswnpnYbA5p3NM_';

        // Datos de la notificación
        $data = [
            'to' => '/topics/VEU_ANOIA',  //  COnfigurat amb topic per enviar a tots els dispositius subscrits al tema, en cas de voler enviar a 1 dispositiu concret s'hauria d'especificar el token
            'notification' => [
                'title' => $titol,
                'body' => $missatge,
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
        echo "Notificació enviada correctament!!!!";
        header('Location: notificacionsveuanoia_enviada.html');
      }//end if result

      else {

        echo "No tens permís per enviar la notificació";
        header('Location: notificacionsveuanoia_noenviada.html');

      }//end else
}//ens if SERVER
?>
