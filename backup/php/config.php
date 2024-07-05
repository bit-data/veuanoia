<?php
/*define('USER', 'ddb199657');
define('PASSWORD', '^]9X!#@-NB1w');
define('HOST', 'bbdd.clubveuanoia.es');
define('DATABASE', 'ddb199657');*/

define('USER', 'bit_data');
define('PASSWORD', 'F6c9P545[0|#');
define('HOST', 'hl1119.dinaserver.com');
define('DATABASE', 'clubveuanoia');

try {
    $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD,
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    //$connection->set_charset("utf8");
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}//echo "Connected successfully \n";
?>
