<?php
define('USER', 'ddb195589');
define('PASSWORD', '6ce.BM*u@VI)');
define('HOST', 'bbdd.ambiens.es');
define('DATABASE', 'ddb195589');

try {
    $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}//echo "Connected successfully \n";
?>
