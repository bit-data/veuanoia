<?php

  //per eliminar la cookie inici sessió i tornar al login
  //per desencriptar
  $ciphering = "AES-128-CTR";
  $option = 0;
  $dencryption_key= "veuanoia";
  $dencryption_iv= '1234567890123456';

  if(!empty($_COOKIE["usuari"]))
  {

  //per obrir array cookie
  $usuari_decrypt = json_decode($_COOKIE['usuari'], true);

/*  //per accedir als valors dels cookies
  echo $usuari_decrypt['nom_array'];
*/

  $dencryption_name = openssl_decrypt($usuari_decrypt['nom_array'],$ciphering,$dencryption_key,$option,$dencryption_iv);
  $dencryption_mobil = openssl_decrypt($usuari_decrypt['mobil_array'],$ciphering,$dencryption_key,$option,$dencryption_iv);
  $dencryption_email_sub = openssl_decrypt($usuari_decrypt['email_array'],$ciphering,$dencryption_key,$option,$dencryption_iv);
  $dencryption_telefon_sub = openssl_decrypt($usuari_decrypt["telefon_array"],$ciphering,$dencryption_key,$option,$dencryption_iv);
  $dencryption_username = openssl_decrypt($usuari_decrypt["dni_array"],$ciphering,$dencryption_key,$option,$dencryption_iv);
  $dencryption_num_sub = openssl_decrypt($usuari_decrypt["subscriptor_array"],$ciphering,$dencryption_key,$option,$dencryption_iv);

}
//Menu button
        if(array_key_exists('button1', $_POST)) {
            button1();
        }
        function button1() {

            ///OJO el path "/" ha de ser el matex que quan es crea al index
          /*  setcookie ("username","",time()- (60*60*24*365), "/");
            setcookie ("nom","",time()- (60*60*24*365), "/");
            setcookie ("cognoms","",time()- (60*60*24*365), "/");
            setcookie ("email","",time()- (60*60*24*365), "/");
            setcookie ("subscriptor","",time()- (60*60*24*365),"/");
            setcookie ("telefon","",time()- (60*60*24*365),"/");
            setcookie ("dni","",time()- (60*60*24*365),"/");*/
            setcookie ("usuari","",time()- (60*60*24*365),"/");
            header("Location: ../user_pass.php");
        }
?>
