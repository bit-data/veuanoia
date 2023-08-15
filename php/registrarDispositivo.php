<?php

//include_once 'headers.php';
include_once 'config.php';

class RegistroResultado {
    public $code = "";
    public $message = "";
    public $id = 0;

}

$response = new RegistroResultado;
$response->code = "OK";
$response->message = "";
$response->id = 0;
try{

/*$prueba='holaaaaa';
$sql = "INSERT INTO firebase_push (deviceid) VALUES ('$prueba')";
$stmt = $connection->prepare($sql);
$stmt->execute();*/


     //***Verificacion de campos
     if (isset($_POST['deviceid'])) {
        $deviceid = $_POST['deviceid'];

echo "hola5";

        if($deviceid==NULL) {
            $response->code = "ERR";
            $response->message = "Token Nulo";
            $response->id = 0;
            echo "hola6";

        }else{

            $id = null;
            if (isset($_POST['id'])) {
                $id = $_POST['id'];
                echo "hola7";
            }

            //registro en la DB el token y el estado
            $mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);

            if ($id != null){
              //  $stmt = $mysqli->prepare("UPDATE firebase_push SET deviceid = ? WHERE ID =  ?");
                $sql = "UPDATE firebase_push SET ')";
                $stmt = $connection->prepare($sql);
                $stmt->execute();
                $stmt->close();
                echo "hola1";
            }else{
                $sql = "INSERT INTO firebase_push (deviceid) VALUES ('$deviceid')";
                $stmt = $connection->prepare($sql);
                $stmt->execute();
                $stmt->close();
                echo "hola2";
            }
            $mysqli -> close();
            echo "hola3";
        }
     }else{
        $response->code = "ERR";
        $response->message = "Faltan campos";
        $response->id = 0;
    }

} catch(Exception $e1) {
    $response->code = "ERR";
    $response->message = "Error";
    $response->id = 0;
}

$myJSON = json_encode($response);
echo $myJSON;



?>
