<!DOCTYPE html>
<html>
<head>
<title>index</title>
<link rel="stylesheet" type="text/css" href="../css/styles.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0"&amp;gt;>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
  <div id="logo">
    <img src="../images/logo_sub2.png" alt="Logo del club del subscriptor" width="30%">
  </div>
  <div id="main">
    <h1>Contacte</h1>
<form name="contacte" method="post" action="enviar_form.php">
    <div class="form-element">
        <label>Subscriptor/a</label>
        <input type="text" class="input_form" name="nom_cognoms" value="<?php echo $_COOKIE['nom'] ?>" required />
    </div>
    <div class="form-element">
      <label class="email">Email</label>
      <input type="text" class="input_form" name="email" value="<?php { echo $_COOKIE["email"]; } ?>" required />
    </div>
    <div class="form-element">
      <label class="text">Text</label>
      <textarea rows= "5" class="input_form" name="comentari" class="text_area" value="" required></textarea>
    </div>
    <button type="submit" class="bt_mida" name="enviar" value="login">Enviar</button>
</form>
</div>
<footer>
    <ul>
      <li><a href="">Política de privacitat</li></a>
      <li><a href="">Política de cookies</li></a>
      <li>App desenvolupada per <a href="https://wwww.bit-data.es">Bit_Data</li></a>
    </ul>
</footer>
</body>
</html>
