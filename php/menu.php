<!DOCTYPE html>
<html>
<head>
<title>menu</title>
<link rel="stylesheet" type="text/css" href="../css/styles.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0"&amp;gt;>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
  <div id="logo">
    <img src="../images/logo_sub2.png" alt="Logo del club del subscriptor" width="30%">
  </div>
  <div id="main">
    <h1>Hola <?php echo $_COOKIE['nom'] ?>!</h1>

    <a href="carnet.php"><button class="bt_mida">El meu carnet</button></a>
    <a href="carnet.php"><button class="bt_mida">Promocions</button></a>
    <a href="carnet.php"><button class="bt_mida">Contacte</button></a>
    <form method="post">
        <input type="submit" name="button1" class="bt_mida" value="Tancar sessió" />
    </form>
  </div>
  <footer>
  Politica privacitat, cookies, desenvolupador
  </footer>
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
