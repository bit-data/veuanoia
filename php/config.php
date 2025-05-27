<?php

/*define('USER', 'bit_data');
define('PASSWORD', 'F6c9P545[0|#');
define('HOST', 'hl1119.dinaserver.com');
define('DATABASE', 'clubveuanoia');*/

define('USER', 'ddb253515');
define('PASSWORD', 'F6c9P545[0|#');
define('HOST', 'bbdd.ambiens.es');
define('DATABASE', 'ddb253515');

try {
    $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD,
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    //$connection->set_charset("utf8");
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}//echo "Connected successfully \n";

//ApiKey FCM
define ('FMC_APIKEY', "AAAAZYx9yms:APA91bH6m28my-A1xERbDzjiLKIYjK_gNrr5PJ-1yd1gDuVtQSkT93rmnlPZOhyW7ECGHvxwYx55FB4Fm3S2R3ygbS4h2W8D_M-I_TQtBpNAFXZiVON-hSb29HkBGw7Qo73QzrQDgfwh")
?>
