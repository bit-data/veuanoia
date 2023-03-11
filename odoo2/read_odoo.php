<?php

// Include the Ripcord library

require_once('phpxmlrpc-4.10.1/lib/xmlrpc.inc');
include('../php/config.php');

// Create connection

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
$request = new xmlrpcmsg('execute_kw', array(
   new xmlrpcval($db, 'string'),
   new xmlrpcval($uid, 'int'),
   new xmlrpcval($password, 'string'),
   new xmlrpcval('sale.subscription', 'string'),
   new xmlrpcval('search_read', 'string'),
   new xmlrpcval(
      array(
         new xmlrpcval(array(), 'array', 'struct'),
         new xmlrpcval(
            array(
               new xmlrpcval('name', 'string'),
               new xmlrpcval('partner_id', 'string'),
               new xmlrpcval('stage_id', 'string')
            ), 'array'
         )
      ), 'array'
   )
));

// Enviar la solicitud al servidor y obtener la respuesta
$response = $client->send($request);

// Verificar que la respuesta del servidor es válida
if (!$response->faultCode()) {
   // Obtener los resultados de la respuesta
   $value = $response->value();
   if ($value->kindOf() == 'array') {
      $results = $value->scalarval();
      foreach ($results as $result) {

         $codi_subscriptor = $result['name']->scalarval();
         echo "Codi subscriptor: " . $codi_subscriptor . "<br>";

         $nom_subcriptor = $result['partner_id'][1]->scalarval();
         echo "Nom: " . $nom_subcriptor . "<br>";

         $estat_subscripcio = $result['stage_id'][1]->scalarval();
         echo "Estat subscripció: " . $estat_subscripcio . "<br>";
         // Hacer algo con los resultados

         // Obtener el ID del partner
         $partner_id = $result['partner_id'][0]->scalarval();
         echo "id_client ".$partner_id. "<br>";

// Crear una solicitud XML-RPC para la función "execute_kw" en la tabla "res.partner"
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

          echo "Codi subscriptor: " . $codi_subscriptor . "<br>";

         echo "<br>";
}
}
}
}
}

    if (($estat_subscripcio == "In Progress")){

      //$sql = "SELECT * FROM subscriptors_odoo";
        $sql = "INSERT INTO subscriptors_odoo VALUES ('','$codi_subscriptor',$partner_id,'$nom_subcriptor','$cif_subscriptor','$email_subscriptor','$telefon_subscriptor','$mobil_subscriptor')";
        $sql2 = "INSERT INTO subscriptors_passwords VALUES ($partner_id,'$cif_subscriptor','$cif_subscriptor')";

        $stmt->bindParam(':num_subs', $codi_subscriptor, PDO::PARAM_STR);
        $stmt->bindParam(':id_partern', $partner_id, PDO::PARAM_STR);
        $stmt->bindParam(':nom', $nom_subcriptor, PDO::PARAM_STR);
        $stmt->bindParam(':dni', $cif_subscriptor, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email_subscriptor, PDO::PARAM_STR);
        $stmt->bindParam(':telefon', $telefon_subscriptor, PDO::PARAM_STR);
        $stmt->bindParam(':mobil', $mobil_subscriptor, PDO::PARAM_STR);

        $stmt->execute();

        $stmt2->bindParam(':id_partern', $partner_id, PDO::PARAM_STR);
        $stmt2->bindParam(':dni', $cif_subscriptor, PDO::PARAM_STR);
        $stmt2->bindParam(':password', $cif_subscriptor, PDO::PARAM_STR);

        $stmt2->execute();

    $connection = null;
  }//end if "in progress"
}//end if(!$response->faultCode()) {

//---->Codi aprofitable<--------

//Per buscar un id de subscriptor
/*
$sales_order_id = 627;
//$sales_order_data = $models->execute_kw($db, $uid, $password, 'sale.order', 'read', array(array($sales_order_id)));
$sales_order_data = $models->execute_kw($db, $uid, $password, 'sale.subscription', 'read', array(array($sales_order_id)));
//print_r($sales_order_data);
echo '<br>';
//per llistar els camps concrets que ens interessen
echo 'codi subscriptor: '.$sales_order_data[0]['name'].'<br>';
echo 'nom: '.$sales_order_data[0]['partner_id'][1].'<br>';
//echo $sales_order_data[0]['display_name'].'<br>';
//echo $sales_order_data[0]['x_nom_id'].'<br>';
//echo 'vàlid fins: '.$sales_order_data[0]['recurring_next_date'].'<br>';
echo 'Subcripció?: '.$sales_order_data[0]['stage_id'][1].'<br>';
//per saber el id client i consultar les dades de client
$partner_id = $sales_order_data[0]['partner_id'][0];
echo 'id taula client: '.$partner_id.'<br>';

$partners_dades = $models->execute_kw($db, $uid, $password,'res.partner', 'search_read', [[['id', '=', $partner_id]]], ['fields' => ['name', 'email', 'mobile','phone','vat']]);

foreach ($partners_dades as $partner) {
    echo "Nom: " . $partner['name'] . "<br>";
    echo "Email: " . $partner['email'] . "<br>";
    echo "mòbil: " . $partner['mobile'] . "<br>";
    echo "phone: " . $partner['phone'] . "<br>";
    echo "CIF: " . $partner['vat'] . "<br>";
    echo "<br>";
}*/
// per llistar les dades concretes de tots els clients
/*$partners = $models->execute_kw($db, $uid, $password,'res.partner', 'search_read', [[]], ['fields' => ['name', 'email', 'mobile','vat']]);

foreach ($partners as $partner) {
    echo "Nombre: " . $partner['name'] . "<br>";
    echo "Email: " . $partner['email'] . "<br>";
    echo "mobile: " . $partner['mobile'] . "<br>";
    echo "CIF: " . $partner['vat'] . "<br>";
    echo "<br>";
}*/

/*//no tenim permisos per veure les taules
$tables = $models->execute_kw($db, $uid, $password,
       'ir.model', 'search',
       array(array(array('model', '=', 'res.partner'))));
   foreach ($tables as $table) {
       echo $table . "\n";
   }
*/

?>
