<?php

include_once 'config.php';

/*$token_devide = $_GET['token'];
$sql = "INSERT INTO firebase_push (deviceid) VALUES ('$token_devide')";
$stmt = $connection->prepare($sql);
$stmt->execute();*/


$prueba="nul";
//$prueba = $_GET['token'];
$sql = "SELECT id FROM firebase_push WHERE deviceid= '$prueba'";
$stmt = $connection->prepare($sql);
$stmt->execute();

//$result = $stmt;

$result = $stmt->fetch(PDO::FETCH_ASSOC);

if ($result=="")
{
  /*sinó està registrat resgistreme el telèfon*/
  echo "no hi ha registre";
  $token_devide = $_GET['token'];
  $sql = "INSERT INTO firebase_push (deviceid) VALUES ('$token_devide')";
  $stmt = $connection->prepare($sql);
  $stmt->execute();
}
else {
  echo "telèfon registrat";
  //si ja està registrat no el resgistrem
}

$connection->close();
echo "hola2";

?>
