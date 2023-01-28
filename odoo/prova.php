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

//Per buscar un id de subscriptor

$sales_order_id = 627;
//$sales_order_data = $models->execute_kw($db, $uid, $password, 'sale.order', 'read', array(array($sales_order_id)));
$sales_order_data = $models->execute_kw($db, $uid, $password, 'sale.subscription', 'read', array(array($sales_order_id)));
//print_r($sales_order_data);
echo '<br>';
//per llistar els camps concrets que ens interessen
echo 'codi subscriptor: '.$sales_order_data[0]['name'].'<br>';
echo 'nom: '.$sales_order_data[0]['partner_id'][1].'<br>';
//echo $sales_order_data[0]['display_name'].'<br>';
//echo $sales_order_data[0]['x_nom_id'].'<br>';
//echo 'vàlid fins: '.$sales_order_data[0]['recurring_next_date'].'<br>';
echo 'Subcripció?: '.$sales_order_data[0]['stage_id'][1].'<br>';
//per saber el id client i consultar les dades de client
$partner_id = $sales_order_data[0]['partner_id'][0];
echo 'id taula client: '.$partner_id.'<br>';

$partners_dades = $models->execute_kw($db, $uid, $password,'res.partner', 'search_read', [[['id', '=', $partner_id]]], ['fields' => ['name', 'email', 'mobile','phone','vat']]);

foreach ($partners_dades as $partner) {
    echo "Nombre: " . $partner['name'] . "<br>";
    echo "Email: " . $partner['email'] . "<br>";
    echo "mòbil: " . $partner['mobile'] . "<br>";
    echo "phone: " . $partner['phone'] . "<br>";
    echo "CIF: " . $partner['vat'] . "<br>";
    echo "<br>";
}
// per llistar les dades concretes de tots els clients
/*$partners = $models->execute_kw($db, $uid, $password,'res.partner', 'search_read', [[]], ['fields' => ['name', 'email', 'mobile','vat']]);

foreach ($partners as $partner) {
    echo "Nombre: " . $partner['name'] . "<br>";
    echo "Email: " . $partner['email'] . "<br>";
    echo "mobile: " . $partner['mobile'] . "<br>";
    echo "CIF: " . $partner['vat'] . "<br>";
    echo "<br>";
}*/

//print_r($partners);
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
//echo $partners[0]['name'].'<br>';
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
