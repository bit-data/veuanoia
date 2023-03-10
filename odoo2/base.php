<?php

require_once('phpxmlrpc-4.10.1/lib/xmlrpc.inc');
include('../php/config.php');

// Create connection
//$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$connection) {
  die("Connection failed: " . mysqli_connect_error());
} else {echo "connexió ok";}

$sql = "INSERT INTO subscriptors_odoo VALUES ('',:num_subs,:id_partern,:nom,:dni,:email,:telefon,:mobil)";
$sql2 = "INSERT INTO subscriptors_passwords VALUES (:id_partern,:dni,:password)";

$stmt = $connection->prepare($sql);
$stmt2 = $connection->prepare($sql2);

//---->INICI CONNEXIÓ<--------
// Set up the connection details

$url = "https://publicacionsanoia.odoo.com";
$db = "dsardai2t-publicacionsanoia-main-4330105";
$username = "club@veuanoia.cat";
$password = "VeuAnoia2022";

// Create a new Ripcord client
$client = new xmlrpc_client("$url/xmlrpc/2/common");

// Crear una solicitud XML-RPC para la función "authenticate"
$request = new xmlrpcmsg('authenticate', array(
    new xmlrpcval($db, 'string'),
    new xmlrpcval($username, 'string'),
    new xmlrpcval($password, 'string'),
    new xmlrpcval(array(), 'struct')
));

// Enviar la solicitud al servidor y obtener la respuesta
$response = $client->send($request);

// Obtener el UID del usuario autenticado de la respuesta
$uid = $response->value()->scalarval();

echo 'hola '.$uid;

// Crear un objeto cliente XML-RPC para el objeto "object"
$client = new xmlrpc_client("$url/xmlrpc/2/object");


// Crear una solicitud XML-RPC para la función "execute_kw"
/*$request = new xmlrpcmsg('execute_kw', array(
   new xmlrpcval($db, 'string'),
   new xmlrpcval($uid, 'int'),
   new xmlrpcval($password, 'string'),
   new xmlrpcval('res.partner', 'string'),
   new xmlrpcval('search_read', 'string'),
   new xmlrpcval(
      array(
         new xmlrpcval(array(), 'array', 'struct'),
         new xmlrpcval(
            array(
               new xmlrpcval('name', 'string'),
               new xmlrpcval('email', 'string'),
               new xmlrpcval('mobile', 'string'),
               new xmlrpcval('vat', 'string')
            ), 'array'
         )
      ), 'array'
   )
));*/


/*$request = new xmlrpcmsg('execute_kw', array(
   new xmlrpcval($db, 'string'),
   new xmlrpcval($uid, 'int'),
   new xmlrpcval($password, 'string'),
   new xmlrpcval('res.partner', 'string'),
   new xmlrpcval('search_read', 'string'),
   new xmlrpcval(
      array(
        new xmlrpcval(
array(
new xmlrpcval(
array(
new xmlrpcval('name', 'string'),
new xmlrpcval('ilike', 'string'),
new xmlrpcval('A%', 'string')
), 'array'
)
), 'array', 'struct'
),
         new xmlrpcval(
            array(
               new xmlrpcval('name', 'string'),
               new xmlrpcval('email', 'string'),
               new xmlrpcval('mobile', 'string'),
               new xmlrpcval('vat', 'string')
            ), 'array'
         )
      ), 'array'
   )
));*/

$partner_id = 19568;

$request_partner = new xmlrpcmsg('execute_kw', array(
   new xmlrpcval($db, 'string'),
   new xmlrpcval($uid, 'int'),
   new xmlrpcval($password, 'string'),
   new xmlrpcval('res.partner', 'string'),
   new xmlrpcval('search_read', 'string'),
   new xmlrpcval(
      array(
        new xmlrpcval(
array(
new xmlrpcval(
array(
new xmlrpcval('id', 'string'),
new xmlrpcval('ilike', 'string'),
new xmlrpcval($partner_id, 'int')
), 'array'
)
), 'array', 'struct'
),
         new xmlrpcval(
            array(
               new xmlrpcval('name', 'string'),
               new xmlrpcval('email', 'string'),
               new xmlrpcval('mobile', 'string'),
               new xmlrpcval('phone', 'string'),
               new xmlrpcval('vat', 'string')
            ), 'array'
         )
      ), 'array'
   )
));

// Enviar la solicitud al servidor y obtener la respuesta
$response_partner = $client->send($request_partner);

// Verificar que la respuesta del servidor es válida
if (!$response_partner->faultCode()) {
   // Obtener los resultados de la respuesta
   $value = $response_partner->value();
   if ($value->kindOf() == 'array') {
      $partners = $value->scalarval();
      foreach ($partners as $partner) {

         echo "Nom: " . $partner['name']->scalarval() . "<br>";

         $email_subscriptor = $partner['email']->scalarval();
         echo "Email: " . $email_subscriptor . "<br>";

         $mobil_subscriptor = $partner['mobile']->scalarval();
         echo "mòbil: " . $mobil_subscriptor . "<br>";

         $telefon_subscriptor = $partner['phone']->scalarval();
         echo "phone: " . $telefon_subscriptor . "<br>";

         $cif_subscriptor = $partner['vat']->scalarval();
         echo "CIF: " . $cif_subscriptor . "<br>";

         echo "<br>";
}
}
}


?>
