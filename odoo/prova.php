<?php

// Include the Ripcord library

require_once('ripcord/ripcord.php');

// Set up the connection details
$url = "https://veuanoiasubs.odoo.com";
$db = "dsardai2t-veuanoiasubs-main-6880959";
$username = "alberto.sanchez@bit-data.es";
$password = "*Bit-Data19";

// Create a new Ripcord client
$common = ripcord::client("$url/xmlrpc/2/common");

// Authenticate
$uid = $common->authenticate($db, $username, $password, array());

// Create a new client for the objects API
$models = ripcord::client("$url/xmlrpc/2/object");

//---->FINS AQUÍ CONNEXIÓ<--------



$sales_order_id = 596;
//$sales_order_data = $models->execute_kw($db, $uid, $password, 'sale.order', 'read', array(array($sales_order_id)));
$sales_order_data = $models->execute_kw($db, $uid, $password, 'sale.subscription', 'read', array(array($sales_order_id)));
print_r($sales_order_data);
echo '<br>';
echo $sales_order_data[0]['name'].'<br>';
echo $sales_order_data[0]['display_name'].'<br>';
echo $sales_order_data[0]['x_nom_id'].'<br>';
echo 'vàlid fins: '.$sales_order_data[0]['recurring_next_date'].'<br>';
//$sales_order_data = $models->execute_kw($db, $uid, $password, 'sale.subscription', 'search', array(array()));
// Print the results
//print_r($sales_order_data);


/*//array amb totes les dades sales.orders
$sales_orders = $models->execute_kw($db, $uid, $password, 'sale.order', 'search', array(array()));

// Print the results
print_r($sales_orders);
*/
/*
//array amb totes les dades res.partner
// Use the client to call a method on the Odoo server
$partners = $models->execute_kw($db, $uid, $password, 'res.partner', 'search', array(array()));

// Print the results
print_r($partners);
*/


/*//no tenim permis
$tables = $models->execute_kw($db, $uid, $password,
        'ir.model', 'search',
        array(array(array('model', '=', 'res.partner'))));
    foreach ($tables as $table) {
        echo $table . "\n";
    }
*/

/*//no tenim permisos per veure les taules
$tables = $models->execute_kw($db, $uid, $password,
       'ir.model', 'search',
       array(array(array('model', '=', 'res.partner'))));
   foreach ($tables as $table) {
       echo $table . "\n";
   }
*/

?>
