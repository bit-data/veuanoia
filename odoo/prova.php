<?php

// Include the Ripcord library

//require_once('ripcord/ripcord.php');

include('../php/config.php');
// Create connection
//$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$connection) {
  die("Connection failed: " . mysqli_connect_error());
} else {echo "connexió ok";}

//$sql = "INSERT INTO subscriptors_odoo VALUES ('','VEUuu78',19545,'ADECCO TT SA','A80903180','amaria.miranda@adecco.com','+34 938 04 10 11','','A80903180')";

$name = "Johnn";
    $email = "john@example.com";


//$sql = "INSERT INTO prova VALUES (:name, :email)";

$sql = "INSERT INTO subscriptors_odoo VALUES ('',:num_subs,:id_partern,:nom,:dni,:email,:telefon,:mobil,:password)";


    $stmt = $connection->prepare($sql);
    $stmt->bindParam(':num_subs', $codi_subscriptor, PDO::PARAM_STR);
    $stmt->bindParam(':id_partern', $partner_id, PDO::PARAM_STR);
    $stmt->bindParam(':nom', $nom_subcriptor, PDO::PARAM_STR);
    $stmt->bindParam(':dni', $cif_subscriptor, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email_subscriptor, PDO::PARAM_STR);
    $stmt->bindParam(':telefon', $telefon_subscriptor, PDO::PARAM_STR);
    $stmt->bindParam(':mobil', $mobil_subscriptor, PDO::PARAM_STR);
    $stmt->bindParam(':password', $cif_subscriptor, PDO::PARAM_STR);

    $stmt->execute();

$connection = null;
?>
