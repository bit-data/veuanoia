<?php




// Configurar la clave de API de Sendinblue y la URL de la API
$api_key = 'TU_API_KEY_DE_SENDINBLUE';
$api_url = 'https://api.sendinblue.com/v3/contacts';
$api_key = 'TU_CLAVE_DE_API';
$user_id = 'ID_DEL_USUARIO_A_ELIMINAR';

$url = 'https://api.sendinblue.com/v3/contacts/'.$user_id;
$headers = array('api-key: '.$api_key);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($ch);
curl_close($ch);

// Verificar si la solicitud fue


?>
