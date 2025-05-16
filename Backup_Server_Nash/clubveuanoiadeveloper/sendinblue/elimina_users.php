<?php

//PER ELIMINAR 1 CONTACTE

// Set the API key and endpoint URL
/*$api_key = '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';
$endpoint = 'https://api.sendinblue.com/v3/contacts';

// Set the email address of the user you want to delete
$email = 'pavo5@ejemplo.com';

// Set the endpoint URL for deleting a contact
$url = $endpoint . '/' . urlencode($email);

// Initialize cURL and set the options
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
curl_setopt($ch, CURLOPT_HTTPHEADER, array("api-key: $api_key"));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute the cURL request
$response = curl_exec($ch);

// Check for errors and handle the response
if($response === false) {
    echo 'Error: ' . curl_error($ch);
} else {
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if($http_code === 204) {
        echo 'El usuario fue eliminado correctamente.';
    } else {
        echo 'Error al eliminar el usuario. Código HTTP: ' . $http_code;
    }
}

// Close the cURL session
curl_close($ch);*/


//PER ELIMINAR VARIOS CONTACTES A UN BUCLE
// Set the API key and endpoint URL
/*$api_key = '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';
$endpoint = 'https://api.sendinblue.com/v3/contacts';

// Define an array of email addresses to delete
$email_list = array('pavo6@ejemplo.com', 'pavo4@ejemplo.com');

// Loop through the email list and send a DELETE request for each user
foreach($email_list as $email) {
    // Set the endpoint URL for deleting a contact
    $url = $endpoint . '/' . urlencode($email);

    // Initialize cURL and set the options
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("api-key: $api_key"));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Execute the cURL request
    $response = curl_exec($ch);

    // Check for errors and handle the response
    if($response === false) {
        echo 'Error eliminando el usuario: ' . $email . '. Error: ' . curl_error($ch);
    } else {
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if($http_code === 204) {
            echo 'Usuario eliminado correctamente: ' . $email . PHP_EOL;
        } else {
            echo 'Error eliminando el usuario: ' . $email . '. Código HTTP: ' . $http_code . PHP_EOL;
        }
    }

    // Close the cURL session
    curl_close($ch);
}*/

//PER ELIMINAR TOTS ELS USUARIS

// Set the API key and endpoint URL
$api_key = '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';

$endpoint = 'https://api.sendinblue.com/v3/contacts';

// Set the email substring to search for
$email_substring = '';

// Set the endpoint URL for searching contacts
$url = $endpoint . '?email=' . urlencode($email_substring);

// Initialize cURL and set the options
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("api-key: $api_key"));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute the cURL request to search for contacts
$response = curl_exec($ch);

// Check for errors and handle the response
if($response === false) {
    echo 'Error buscando contactos: ' . curl_error($ch);
} else {
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if($http_code === 200) {
        $contacts = json_decode($response, true)['contacts'];
        if(count($contacts) > 0) {
            // Loop through the contacts and send a DELETE request for each one
            foreach($contacts as $contact) {
                $contact_id = $contact['id'];
                $delete_url = $endpoint . '/' . $contact_id;

                // Initialize cURL and set the options
                $delete_ch = curl_init();
                curl_setopt($delete_ch, CURLOPT_URL, $delete_url);
                curl_setopt($delete_ch, CURLOPT_CUSTOMREQUEST, "DELETE");
                curl_setopt($delete_ch, CURLOPT_HTTPHEADER, array("api-key: $api_key"));
                curl_setopt($delete_ch, CURLOPT_RETURNTRANSFER, true);

                // Execute the cURL request to delete the contact
                $delete_response = curl_exec($delete_ch);

                // Check for errors and handle the response
                if($delete_response === false) {
                    echo 'Error eliminando el usuario: ' . $contact['email'] . '. Error: ' . curl_error($delete_ch);
                } else {
                    $delete_http_code = curl_getinfo($delete_ch, CURLINFO_HTTP_CODE);
                    if($delete_http_code === 204) {
                        echo 'Usuario eliminado correctamente: ' . $contact['email'] . PHP_EOL;
                    } else {
                        echo 'Error eliminando el usuario: ' . $contact['email'] . '. Código HTTP: ' . $delete_http_code . PHP_EOL;
                    }
                }

                // Close the cURL session for deleting the contact
                curl_close($delete_ch);
            }
        } else {
            echo 'No se encontraron contactos con el substring de correo electrónico: ' . $email_substring;
        }
    } else {
        echo 'Error buscando contactos. Código HTTP: ' . $http_code;

}
}

?>
