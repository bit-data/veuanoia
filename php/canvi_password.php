<?php
include('config.php');
include('functions.php');
session_start();

if(!empty($_POST['nou_password'])){
$new_password = $_POST['nou_password'];
$repit_password = $_POST['repeteix_password'];

//echo $dencryption_username;

if ($new_password==$repit_password && $new_password!="" ){

    $query = $connection->prepare("UPDATE subscriptors_passwords SET password='$new_password' WHERE DNI='$dencryption_username'");
    $query->execute();
    header("Location: ../user_pass.php");

}

if ($new_password!=$repit_password && $new_password!="" ) {

  echo "<script type='text/javascript'>
if (confirm('Les contrasenyes no coincideixen')) {

    window.history.back();
}
else{
  window.history.back();
}
</script>";

}
}
?>
