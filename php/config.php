<?php
define('USER', 'ddb199657');
define('PASSWORD', '6ce.BM*u@VI)');
define('HOST', 'bbdd.clubveuanoia.es');
define('DATABASE', 'ddb199657');

try {
    $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}//echo "Connected successfully \n";
?>
