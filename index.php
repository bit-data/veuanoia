<!DOCTYPE html>
<html>
<head>
<title>index</title>
<link rel="stylesheet" type="text/css" href="css/styles.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0"&amp;gt;>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
  <div id="logo">
    <img src="images/logo_sub2.png" alt="Logo del club del subscriptor" width="30%">
  </div>
  <div id="main">
    <h1>Inici de sessió</h1>
  <form method="post"  name="signin-form">
      <div class="form-element">
          <label>DNI/CIF</label>
          <input type="text" name="username" value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; } ?>" pattern="[a-zA-Z0-9]+" required />
      </div>
      <div class="form-element">
          <label>Password</label>
          <input type="password" name="password" required />
      </div>
      <button type="submit" name="login" value="login">Log In</button>
  </form>
  </div>
  <footer>
  Politica privacitat, cookies, desenvolupador
  </footer>
</body>
</html>

<?php

include('php/config.php');
session_start();
//bucle per comprobar si hi ha cookie prèvia

if(empty($_COOKIE["username"]))
{

//si està buida continua al login
}
else { //comprobem que el dni continua a la bbdd no l'han donat de baixa
  $dni_sub = $_COOKIE["username"];
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
    //header("Location: php/error_login.php");
  } else {
  //si hi ha cookie i el DNI continua a la BBDD carrèga el menú
  header("Location: php/menu.php");
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
  //  echo $passwordHash; //mostrar dades bbdd

  //bucle per comprobar si està a la bbdd i redirigir cap al menú o al error
    if (!$result) {
        //echo '<p class="error">¡Username password combination is wrong!</p>';
        header("Location: php/error_login.html");
    } else {
        //if (password_verify($password, $result['PASSWORD'])) {
        if ($password == $passwordHash) {
            $_SESSION['num_subscriptor'] = $result['num_subs'];
            //echo '<p class="success">Congratulations, you are logged in!</p>';
            if(empty($_POST["username"]))
            {
            echo "no hi ha cookie";

            }else {
              echo " hi ha cookie";
              setcookie ("username",$username,time()+ (60*60*24*365),"/");
              setcookie ("nom",$name,time()+ (60*60*24*365),"/");
              setcookie ("cognoms",$surname,time()+ (60*60*24*365),"/");
              setcookie ("email",$email_sub,time()+ (60*60*24*365),"/");
            }
            header("Location: php/menu.php");
            echo  $_SESSION['num_subscriptor'];

        } else {
            //echo '<p class="error">Username password combination is wrong!</p>';
            header("Location: php/error_login.html");
        }
    }
}
?>
