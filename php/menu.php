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
    <h1>Hola <?php echo $_COOKIE['username'] ?>!</h1>

    <a href="carnet.php"><button class="bt_mida">El meu carnet</button></a>
    <a href="carnet.php"><button class="bt_mida">Promocions</button></a>
    <a href="carnet.php"><button class="bt_mida">Contacte</button></a>
    <a href=""><button class="bt_mida" >Tancar sessió</button></a>

  </div>
  <footer>
  Politica privacitat, cookies, desenvolupador
  </footer>
</body>
</html>
