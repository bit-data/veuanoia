<!doctype html>
<html lang="cat">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <title>Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/styles.css">
<style>
  .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
  }

  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }
  }

  .b-example-divider {
    height: 3rem;
    background-color: rgba(0, 0, 0, .1);
    border: solid rgba(0, 0, 0, .15);
    border-width: 1px 0;
    box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
  }

  .b-example-vr {
    flex-shrink: 0;
    width: 1.5rem;
    height: 100vh;
  }

  .bi {
    vertical-align: -.125em;
    fill: currentColor;
  }

  .nav-scroller {
    position: relative;
    z-index: 2;
    height: 2.75rem;
    overflow-y: hidden;
  }

  .nav-scroller .nav {
    display: flex;
    flex-wrap: nowrap;
    padding-bottom: 1rem;
    margin-top: -1px;
    overflow-x: auto;
    text-align: center;
    white-space: nowrap;
    -webkit-overflow-scrolling: touch;
  }
</style>
<link href="css/signin.css" rel="stylesheet">
</head>
<body class="text-center">

<main class="form-signin w-100 m-auto">
<form method="post">
  <img class="mb-4" src="images/logo_sub2.png" alt="Logo del club del subscriptor" width="288" height="228">
  <h1 class="h3 mb-3 fw-normal">Inici de sessió</h1>

  <div class="form-floating">
    <input type="text" class="form-control" id="floatingInput" placeholder="DNI/CIF" name="username" pattern="[a-zA-Z0-9]+" required >
    <label for="floatingInput">DNI/CIF</label>
  </div>
  <div class="form-floating">
    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" required>
    <label for="floatingPassword">Password</label>
  </div>

  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me"> Recorda'm
    </label>
  </div>
  <button class="w-100 btn btn-lg btn-primary" type="submit" name="login" value="login">Entrar</button>
</form>
<div class="container">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <div class="col-md-4 d-flex align-items-center">
      <span class="mb-3 mb-md-0 text-muted"><ul>
        <li>&copy; 2022 La Veu Anoia</li>
        <li><a href="">Política de privacitat</li></a>
        <li><a href="">Política de cookies</li></a>
        <li>Developed by <a href="https://wwww.bit-data.es">Bit_Data</li></a>
      </ul></span>
    </div>
    <ul class="">
      <li class="ms-3"><a class="text-muted" href="https://twitter.com/veuanoia"><img src="images/xs/twitter.svg" class="bi" width="24" height="24"></a></li>
      <li class="ms-3"><a class="text-muted" href="https://www.instagram.com/veuanoia/"><img src="images/xs/instagram.svg" class="bi" width="24" height="24"></a></li>
      <li class="ms-3"><a class="text-muted" href="https://www.facebook.com/VeuAnoia/"><img src="images/xs/facebook.svg" class="bi" width="24" height="24"></a></li>
      <li class="ms-3"><a class="text-muted" href="https://www.linkedin.com/company/la-veu-de-l'anoia/"><img src="images/xs/linkedin.svg" class="bi" width="24" height="24"></a></li>
      <li class="ms-3"><a class="text-muted" href="https://www.youtube.com/@laveudelanoia9951"><img src="images/xs/youtube.svg" class="bi" width="24" height="24"></a></li>
    </ul>
  </footer>
</main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
<?php

//include('php/config.php');
include('php/login.php');
/*session_start();
header ('cache-control: private');
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
    setcookie ("subscriptor","",time()- (60*60*24*365), "/");
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
    $num_sub = $result['num_subs'];//guardar dades BBDD
  //  echo $passwordHash; //mostrar dades bbdd

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
              setcookie ("username",$username,time()+ (60*60*24*365),"/");
              setcookie ("nom",$name,time()+ (60*60*24*365),"/");
              setcookie ("cognoms",$surname,time()+ (60*60*24*365),"/");
              setcookie ("email",$email_sub,time()+ (60*60*24*365),"/");
              setcookie ("subscriptor",$num_sub,time()+ (60*60*24*365),"/");
            }
            header("Location: php/menu.php");
            //echo  $_SESSION['num_subscriptor'] . "hola";

        } else {
            //echo '<p class="error">Username password combination is wrong!</p>';
            header("Location: php/error_login.html");
        }
    }
}*/
?>
