<!DOCTYPE html>
<html>
<head>
<title>index</title>
<link rel="stylesheet" type="text/css" href="../css/styles.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0"&amp;gt;>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php
echo "hola";
?>
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
        <input type="text" name="nom_cognoms" value="<?php echo $_COOKIE['nom'] ?>" required />
    </div>
    <div class="form-element">
      <label>Email</label>
      <input type="text" name="email" value="<?php { echo $_COOKIE["email"]; } ?>" required />
    </div>
    <div class="form-element">
      <label>Text</label>
      <input type="textarea" maxlength="500" name="text_area" value="" required />
    </div>
    <button type="submit" name="enviar" value="login">Enviar</button>
</form>
</div>
<footer>
Politica privacitat, cookies, desenvolupador
</footer>
</body>
</html>
