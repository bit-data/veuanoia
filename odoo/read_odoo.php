<?php

// incloure configuració sql i libreria phpxmlrpc

require_once('phpxmlrpc-4.10.1/lib/xmlrpc.inc');
include('../php/config.php');

// COnnexió sql i preparació i execució de consutes sql

if (!$connection) {
  die("Connection failed: " . mysqli_connect_error());
} else {echo "connexió ok <br>";}

$sql = "INSERT INTO subscriptors_odoo VALUES ('',:num_subs,:id_partern,:nom,:dni,:email,:telefon,:mobil)";
$sql2 = "INSERT INTO subscriptors_passwords VALUES (:id_partern,:dni,:password)";
$sql3 = "TRUNCATE TABLE subscriptors_odoo";
$sql4 = "INSERT INTO subscriptors_odoo VALUES ('','Al',3,'CLUB SUBSCRIPTOR SOLÈ SOLÉ','00000000X','club@veuanoia.cat','','')";
$sql5 = "SELECT count(id) FROM subscriptors_odoo";

$stmt = $connection->prepare($sql);
$stmt2 = $connection->prepare($sql2);
$stmt3 = $connection->prepare($sql3);
$stmt3->execute();
$stmt4 = $connection->prepare($sql4);
$stmt5 = $connection->prepare($sql5);



//---->INICI CONNEXIÓ<--------
// Set up the odoo connection

$url = "https://publicacionsanoia.odoo.com";
$db = "dsardai2t-publicacionsanoia-main-4330105";
$username = "club@veuanoia.cat";
$password = "eva4";


$client = new xmlrpc_client("$url/xmlrpc/2/common");
$request = new xmlrpcmsg('authenticate', array(
    new xmlrpcval($db, 'string'),
    new xmlrpcval($username, 'string'),
    new xmlrpcval($password, 'string'),
    new xmlrpcval(array(), 'struct')
));
$response = $client->send($request);

if ($response->faultCode()) {
    die("Error al autenticar: " . $response->faultString());
}

$uid = $response->value()->scalarval();

// Crear un cliente XML-RPC para acceder al modelo 'sale.order'
$client = new xmlrpc_client("$url/xmlrpc/2/object");

// Crear una solicitud XML-RPC para la función "execute_kw"
$request = new xmlrpcmsg('execute_kw', array(
    new xmlrpcval($db, 'string'),
    new xmlrpcval($uid, 'int'),
    new xmlrpcval($password, 'string'),
    new xmlrpcval('sale.order', 'string'),
    new xmlrpcval('search_read', 'string'),
    new xmlrpcval(array(), 'array'),
    new xmlrpcval(array(
        'fields' => new xmlrpcval(array(
            new xmlrpcval('client_order_ref', 'string'),
            new xmlrpcval('partner_id', 'string'),
            new xmlrpcval('subscription_state', 'string')
        ), 'array')
    ), 'struct')
));//end request
$response = $client->send($request);

if ($response->faultCode()) {
    die("Error en la consulta a Odoo: " . $response->faultString());
}

// Procesar y mostrar los resultados
$value = $response->value();
if ($value->kindOf() == 'array') {
    $results = $value->scalarval();
    $counter = 0; // Contador de registros con estado '3_progress'

    foreach ($results as $result) {
       
        $codi_subscriptor= $result['client_order_ref']->scalarval();
        $partner = $result['partner_id'];      
        $estat_subscripcio = $result['subscription_state']->scalarval(); // Posibles resultados: 1_draft, 3_progress, 4_paused, 6_churn
       
        // Filtrar solo si el estado de la suscripción es "3_progress" que son las activas
        if ($estat_subscripcio == '3_progress') {
            $partner_id = $partner[0]->scalarval(); // ID del partner
            $nom_subcriptor = $partner[1]->scalarval(); // Nombre del partner

            /*echo "Codi subscriptor: " . $codi_subscriptor . "<br>";
            echo "id_client ".$partner_id. "<br>";
            echo "Nom: " . $nom_subcriptor . "<br>";
            echo "Estat subscripció: " . $estat_subscripcio . "<br>";*/
            $counter++; // Incrementar el contador


            $request = new xmlrpcmsg('execute_kw', array(
                new xmlrpcval($db, 'string'),
                new xmlrpcval($uid, 'int'),
                new xmlrpcval($password, 'string'),
                new xmlrpcval('res.partner', 'string'),
                new xmlrpcval('search_read', 'string'),
                new xmlrpcval(array(
                    new xmlrpcval(array(
                        new xmlrpcval(array(
                            new xmlrpcval('id', 'string'),
                            new xmlrpcval('=', 'string'),
                            new xmlrpcval($partner_id, 'int')
                        ), 'array')
                    ), 'array')
                ), 'array'),
                new xmlrpcval(array(
                    'fields' => new xmlrpcval(array(
                        new xmlrpcval('id', 'string'),
                        new xmlrpcval('name', 'string'),
                        new xmlrpcval('mobile', 'string'),
                        new xmlrpcval('phone', 'string'),
                        new xmlrpcval('vat', 'string'),
                        new xmlrpcval('email', 'string')
                    ), 'array')
                ), 'struct')
             ));
             
             $response = $client->send($request);    

             if ($response->faultCode()) {
                die("Error en la consulta a Odoo: " . $response->faultString());
            }
            
            $value = $response->value();
if ($value->kindOf() == 'array') {
    $results = $value->scalarval();
    //$counter = 0; // Contador de registros con estado '3_progress'

    foreach ($results as $result) {
        $id = $result['id']->scalarval();
        $name = $result['name']->scalarval();
        $mobil_subscriptor = $result['mobile']->scalarval();
        $telefon_subscriptor = $result['phone']->scalarval(); 
        $cif_subscriptor = $result['vat']->scalarval();     
        $email_subscriptor = $result['email']->scalarval();
       
        //echo "ID: $id, Name: $name, Telèfon: $telefon_subscriptor, mobil: $mobil_subscriptor, CIF: $cif_subscriptor,  email: $email_subscriptor <br><br>";
      
        
    }//end foreach

    try{
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

      }//end try
      catch (PDOException $e) {
          // Si ocurre un error, mostrar un mensaje de error personalizado
        //  echo "Error al insertar les dades en la bbbdd: " . $e->getMessage();
      }//end catch

}//end kindOf id_partner             
        }//end if estat subscripció
     
    }//end 1er foreach
    echo "<br>Total de registros con subscription_state = 3_progress: $counter";
} /*end kindOf id_partner */else {
    echo "No se obtuvieron resultados.";
}//end else

$stmt4->execute();
$stmt5->execute();
$contador = $stmt5->fetchColumn();
echo "S'han inserit ". $contador. " registres";
?>
