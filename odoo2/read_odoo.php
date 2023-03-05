<?php

// Include the Ripcord library

require_once('phpxmlrpc/lib/xmlrpc.inc');
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

// Create an XML-RPC client instance
$client = new xmlrpc_client($url . "/xmlrpc/2/common");

// Create the authentication parameters
$params = array(
    new xmlrpcval($db, "string"),
    new xmlrpcval($username, "string"),
    new xmlrpcval($password, "string"),
    new xmlrpcval(array(), "struct")
);

// Create the authentication message
$msg = new xmlrpcmsg("authenticate", $params);

// Send the authentication message and get the response
$response = $client->send($msg);

// Get the user ID from the response
$uid = $response->value()->scalarval();

// Create an XML-RPC client instance for the objects API
$client = new xmlrpc_client($url . "/xmlrpc/2/object");

// Create the search parameters
$params = array(
    new xmlrpcval($db, "string"),
    new xmlrpcval($uid, "int"),
    new xmlrpcval($password, "string"),
    new xmlrpcval("sale.subscription", "string"),
    new xmlrpcval("search_read", "string"),
    new xmlrpcval(array(
        new xmlrpcval(array(), "array"),
        new xmlrpcval(array(
            new xmlrpcval("name", "string"),
            new xmlrpcval("partner_id", "string"),
            new xmlrpcval("stage_id", "string")
        ), "array")
    ), "array")
);

// Create the search message
$msg = new xmlrpcmsg("execute_kw", $params);

// Send the search message and get the response
$response = $client->send($msg);

// Get the sales records from the response
$sales = $response->value()->scalarval();

// Loop through the sales records and get the details
foreach ($sales as $sale) {
    $codi_subscriptor = $sale['name'];
    echo "Codi subscriptor: " . $codi_subscriptor . "<br>";

    $nom_subcriptor = $sale['partner_id'][1];
    echo "Nom: " . $nom_subcriptor . "<br>";

    $estat_subscripcio = $sale['stage_id'][1];
    echo "Estat subscripció: " . $estat_subscripcio . "<br>";

    // Get the client ID from the sale record
    $partner_id = $sale['partner_id'][0];
  }

?>
