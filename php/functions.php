<?php

  //per eliminar la cookie inici sessió i tornar al login
  //per desencriptar
  $ciphering = "AES-128-CTR";
  $option = 0;
  $dencryption_key= "veuanoia";
  $dencryption_iv= '1234567890123456';

  $dencryption_name = openssl_decrypt($_COOKIE['nom'],$ciphering,$dencryption_key,$option,$dencryption_iv);
  $dencryption_surname = openssl_decrypt($_COOKIE['cognoms'],$ciphering,$dencryption_key,$option,$dencryption_iv);
  $dencryption_email_sub = openssl_decrypt($_COOKIE['email'],$ciphering,$dencryption_key,$option,$dencryption_iv);
  $dencryption_telefon_sub = openssl_decrypt($_COOKIE["telefon"],$ciphering,$dencryption_key,$option,$dencryption_iv);
  $dencryption_dni_sub = openssl_decrypt($_COOKIE["dni"],$ciphering,$dencryption_key,$option,$dencryption_iv);

//Menu button
        if(array_key_exists('button1', $_POST)) {
            button1();
        }
        function button1() {

            ///OJO el path "/" ha de ser el matex que quan es crea al index
            setcookie ("username","",time()- (60*60*24*365), "/");
            setcookie ("nom","",time()- (60*60*24*365), "/");
            setcookie ("cognoms","",time()- (60*60*24*365), "/");
            setcookie ("email","",time()- (60*60*24*365), "/");
            setcookie ("subscriptor","",time()- (60*60*24*365),"/");
            setcookie ("telefon","",time()- (60*60*24*365),"/");
            header("Location: ../index.php");
        }
?>
