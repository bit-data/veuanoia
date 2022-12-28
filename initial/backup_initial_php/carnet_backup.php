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
<body class="body_carnet">
  <div class="carnet">
    <div class="logo_carnet">
    <img src="../images/logo_sub2_marc.png" alt="Logo del club del subscriptor" width="70%">
  </div>
  <div class="dades_anoia">
    <h3>Antenció al subscriptor/a</br>
    93 804 24 51 / hola@email.cat</h3>
  </div>
  <div class="dades_subscriptor">
    <p><?php echo $_COOKIE['nom']." ".$_COOKIE['cognoms'] ?></br>
    nº subscriptor/a: <?php echo $_COOKIE['subscriptor'] ?></p>
  </div>
  <div class="info_anoia">
    <p>Aquesta targeta serveix per gaudir de tots els avantatges i
      descomptes destinats als subscriptors. En poden gaudir també
      familiars directes del titular.
      En cas de pèrdua cal comunicar-ho al departament de subscriptors.
      <h2>www.veuanoia.cat</h2></p>
</div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
