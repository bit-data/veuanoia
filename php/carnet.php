<!DOCTYPE html>
<html>
<head>
<title>index</title>
<link rel="stylesheet" type="text/css" href="../css/styles.css">

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
  <div id="logo">
    <img src="../images/logo_sub2.png" alt="Logo del club del subscriptor" width="30%">
  </div>
  <div id="main">
    <div id="carnet">
      <div id="telefon">
        <h2>Telèfon d'antenció al subscriptor</br>
        93 804 24 51 / hola@email.cat<h2>
      </div>
        <div id="usuari">
          <p><?php echo $_COOKIE['nom']." ".$_COOKIE['cognoms'] ?></br>
          nº subscriptor/a: <?php echo $_COOKIE['subscriptor'] ?></p>
        </div>
        <div id="info">
          <p>Aquesta targeta serveix per gaudir de tots els avantatges i
            descomptes destinats als subscriptors. En poden gaudir també
            familiars directes del titular.
            En cas de pèrdua cal comunicar-ho al departament de subscriptors.<br/>
            <h1>www.veuanoia.cat</h1></p>
        </div>
    </div>
  </div>
  <footer>
  Politica privacitat, cookies, desenvolupador
  </footer>
</body>
</html>
