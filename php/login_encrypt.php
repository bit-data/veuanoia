<?php
include('php/config.php');
include('functions.php');
session_start();
//header ('cache-control: private');
//bucle per comprobar si hi ha cookie prèvia

if(empty($_COOKIE["username"]))
{

//si està buida continua al login
}
else { //comprobem que el dni continua a la bbdd no l'han donat de baixa
  echo "else ".$_COOKIE["dni"];
  $dni_sub = $dencryption_username;
  $query = $connection->prepare("SELECT * FROM subscriptors WHERE DNI='$dni_sub'");
//  $query->bindParam("username", $username, PDO::PARAM_STR);
  $query->execute();
  $result = $query->fetch(PDO::FETCH_ASSOC);
  //echo "hola".$result;
  if ($result=="")
  {
    setcookie ("username","",time()- (60*60*24*365), "/");
    setcookie ("nom","",time()- (60*60*24*365), "/");
    setcookie ("cognoms","",time()- (60*60*24*365), "/");
    setcookie ("email","",time()- (60*60*24*365), "/");
    setcookie ("subscriptor","",time()- (60*60*24*365), "/");
    setcookie ("telefon","",time()- (60*60*24*365), "/");

    //header("Location: php/error_login.php");
  } else {
  //si hi ha cookie i el DNI continua a la BBDD carrèga el menú
  header("Location: php/menu_encrypt.php");
}
}



//Bucle per login

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    //$query = $connection->prepare("SELECT * FROM subscriptors WHERE USERNAME=:username");
    $query = $connection->prepare("SELECT * FROM subscriptors WHERE DNI=:username");
    $query->bindParam("username", $username, PDO::PARAM_STR);
    $query->execute();

    $result = $query->fetch(PDO::FETCH_ASSOC);


    $passwordHash = $result['password'];//guardar dades BBDD
    $name = $result['nom'];//guardar dades BBDD
    $surname = $result['cognoms'];//guardar dades BBDD
    $email_sub = $result['email'];//guardar dades BBDD
    $num_sub = $result['num_subs'];//guardar dades BBDD
    $telefon_sub = $result['telefon'];//guardar dades BBDD
    $dni_sub = $result['dni'];


    //per encriptar les dades recueprades i guardar-les ales cookies
    $ciphering = "AES-128-CTR";
    $option = 0;
    $encryption_key= "veuanoia";
    $encryption_iv= '1234567890123456';

    $encryption_name = openssl_encrypt($name,$ciphering,$encryption_key,$option,$encryption_iv);
    $encryption_surname = openssl_encrypt($surname,$ciphering,$encryption_key,$option,$encryption_iv);
    $encryption_email_sub = openssl_encrypt($email_sub,$ciphering,$encryption_key,$option,$encryption_iv);
    $encryption_num_sub = openssl_encrypt($num_sub,$ciphering,$encryption_key,$option,$encryption_iv);
    $encryption_telefon_sub = openssl_encrypt($telefon_sub,$ciphering,$encryption_key,$option,$encryption_iv);
    $encryption_dni_sub = openssl_encrypt($dni_sub,$ciphering,$encryption_key,$option,$encryption_iv);
    $encryption_username = openssl_encrypt($username,$ciphering,$encryption_key,$option,$encryption_iv);

  //bucle per comprobar si està a la bbdd i redirigir cap al menú o al error
    if (!$result) {
        //echo '<p class="error">¡Username password combination is wrong!</p>';
        header("Location: php/error_login.html");
    } else {
        //if (password_verify($password, $result['PASSWORD'])) {
        if ($password == $passwordHash) {
            //$_SESSION['num_subscriptor'] = $result['num_subs'];
            //echo '<p class="success">Congratulations, you are logged in!</p>';
            if(empty($_POST["username"]))
            {
          //  echo "no hi ha cookie";

            }else {
            //  echo " hi ha cookie";
              setcookie ("username",$encryption_username,time()+ (60*60*24*365),"/");
              setcookie ("nom",$encryption_name,time()+ (60*60*24*365),"/");
              setcookie ("cognoms",$encryption_surname,time()+ (60*60*24*365),"/");
              setcookie ("email",$encryption_email_sub,time()+ (60*60*24*365),"/");
              setcookie ("subscriptor",$encryption_num_sub,time()+ (60*60*24*365),"/");
              setcookie ("telefon",$encryption_telefon_sub,time()+ (60*60*24*365),"/");
              setcookie ("dni",$encryption_username,time()+ (60*60*24*365),"/");

              $usuari = array(
                "username_array" => $encryption_username,
                "nom_array" => $encryption_name,
                "cognom_array" => $encryption_surname,
                "email_array" => $encryption_email_sub,
                "subscriptor_array" => $encryption_num_sub,
                "telefon_array" => $encryption_telefon_sub,
                "dni_array" => $encryption_username,
              );
              setcookie ("usuari",json_encode($usuari),time()+ (60*60*24*365),"/");

            }
            header("Location: php/menu_encrypt.php");
            //echo  $_SESSION['num_subscriptor'] . "hola";

        } else {
            //echo '<p class="error">Username password combination is wrong!</p>';
            header("Location: php/error_login.html");
        }
    }
}
?>
