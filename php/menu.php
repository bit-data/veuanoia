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
<link rel="stylesheet" type="text/css" href="../css/styles.css">
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
<link href="../css/signin.css" rel="stylesheet">
</head>
<body class="text-center">
  <main class="form-signin w-100 m-auto">
    <img class="mb-4" src="../images/logo_sub2.png" alt="Logo del club del subscriptor" width="288" height="228">
    <h1 class="h3 mb-3 fw-normal">Hola <?php echo $_COOKIE['nom'] ?>!</h1>
    <a href="carnet_portrait.php"><button class="w-100 btn btn-lg btn-primary bt_menu">El meu carnet</button></a>
    <a href="https://veuanoia.cat/"><button class="w-100 btn btn-lg btn-primary bt_menu">Promocions</button></a>
    <a href="contacte.php"><button class="w-100 btn btn-lg btn-primary bt_menu">Contacte</button></a>
    <form method="post">
      <input type="submit" name="button1" class="bt_tancar" value="Tancar sessió" />
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
          <li class="ms-3"><a class="text-muted" href="https://twitter.com/veuanoia"><img src="../images/xs/twitter.svg" class="bi" width="24" height="24"></a></li>
          <li class="ms-3"><a class="text-muted" href="https://www.instagram.com/veuanoia/"><img src="../images/xs/instagram.svg" class="bi" width="24" height="24"></a></li>
          <li class="ms-3"><a class="text-muted" href="https://www.facebook.com/VeuAnoia/"><img src="../images/xs/facebook.svg" class="bi" width="24" height="24"></a></li>
          <li class="ms-3"><a class="text-muted" href=""><img src="../images/xs/linkedin.svg" class="bi" width="24" height="24"></a></li>
          <li class="ms-3"><a class="text-muted" href=""><img src="../images/xs/youtube.svg" class="bi" width="24" height="24"></a></li>
        </ul>
      </footer>
</main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>

<?php

  //per eliminar la cookie inici sessió i tornar al login

        if(array_key_exists('button1', $_POST)) {
            button1();
        }
        function button1() {
            echo "This is Button1 that is selected";
            ///OJO el path "/" ha de ser el matex que quan es crea al index
            setcookie ("username","",time()- (60*60*24*365), "/");
            setcookie ("nom","",time()- (60*60*24*365), "/");
            setcookie ("cognoms","",time()- (60*60*24*365), "/");
            setcookie ("email","",time()- (60*60*24*365), "/");
            header("Location: ../index.php");
        }
?>
