<?php

$new_password = $_POST['nou_password'];
$repit_password = $_POST['repeteix_password'];

if ($new_password==$repit_password && $new_password!="" ){

    header("Location: ../index.php");

}
if ($new_password!=$repit_password && $new_password!="" ) {
  echo "<script type='text/javascript'>alert('Les contrasenyes no coincideixen');</script>";
}

?>
