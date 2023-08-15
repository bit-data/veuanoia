<?php

include_once 'config.php';

echo "hola1";

$prueba='holaaaaa3';
echo "hola11";
$sql = "INSERT INTO firebase_push (deviceid) VALUES ('$prueba')";
echo "hola12";
$stmt = $connection->prepare($sql);
echo "hola13";
$stmt->execute();
echo "hola14";

$result = $stmt;


if ($result->num_rows > 0) {
    $response = array();
    while ($row = $result->fetch_assoc()) {
        $response[] = $row;
    }
    echo json_encode($response);
} else {
    echo "0 resultados";
}
$connection->close();
echo "hola2";
?>
