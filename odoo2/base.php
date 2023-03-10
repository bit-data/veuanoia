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
$id_partner = 19600; // the ID of the partner you want to filter by


$partner_id = 196000;
$id_list[0]= new xmlrpcval($partner_id, 'int');

$request = new xmlrpcmsg('execute_kw', array(
   new xmlrpcval($db, 'string'),
   new xmlrpcval($uid, 'int'),
   new xmlrpcval($password, 'string'),
   new xmlrpcval('res.partner', 'string'),
   new xmlrpcval('search_read', 'string'),
   new xmlrpcval($id_list, "struct"), 
   new xmlrpcval(
      array(
         new xmlrpcval(array(), 'array', 'struct'),
         new xmlrpcval(
            array(
               new xmlrpcval('name', 'string'),
               new xmlrpcval('email', 'string'),
               new xmlrpcval('mobile', 'string'),
               new xmlrpcval('vat', 'string'),
            ), 'array'
         )
      ), 'array'
   )
));

/*$id_partner = 123; // the ID of the partner you want to filter by

$request = new xmlrpcmsg('execute_kw', array(
   new xmlrpcval($db, 'string'),
   new xmlrpcval($uid, 'int'),
   new xmlrpcval($password, 'string'),
   new xmlrpcval('res.partner', 'string'),
   new xmlrpcval('search_read', 'string'),
   new xmlrpcval(
      array(
         new xmlrpcval(
            array(
               array('id', '=', $id_partner)
            ), 'array'
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








echo 'hola2 '.$uid;


// Enviar la solicitud al servidor y obtener la respuesta
$response2 = $client->send($request);

// Verificar que la respuesta del servidor es válida
if (!$response2->faultCode()) {
   // Obtener los resultados de la respuesta
   $value = $response2->value();
   if ($value->kindOf() == 'array') {
      $results = $value->scalarval();
      foreach ($results as $result) {

         $codi_subscriptor = $result['name']->scalarval();
         echo "Codi subscriptor: " . $codi_subscriptor . "<br>";

         $nom_subcriptor = $result['email']->scalarval();
         echo "Nom: " . $nom_subcriptor . "<br>";

         $estat_subscripcio = $result['mobile']->scalarval();
         echo "Estat subscripció: " . $estat_subscripcio . "<br>";
         // Hacer algo con los resultados

         // Obtener el ID del partner
         $partner_id = $result['vat']->scalarval();
         echo "vat " . $partner_id. "<br>";
}
}
}


?>
