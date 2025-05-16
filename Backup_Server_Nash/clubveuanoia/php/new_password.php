<!doctype html>
<html lang="cat">
  <head>
     <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-TQSBSKN6QF"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-TQSBSKN6QF');
</script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <title>Login</title>
    <?php

    include('canvi_password.php');

    ?>
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
<form method="post" //action="canvi_password.php">
  <img class="mb-4" src="../images/logo_sub2.png" alt="Logo del club del subscriptor" width="288" height="228">
  <h1 class="h3 mb-3 fw-normal">Canvi contrasenya</h1>
  <p> Si és la primera vega que inicies sessió o si has oblidat la contrasenya aquí la pots canviar.</p>
  <div class="form-floating">
    <input type="password" class="form-control" id="floatingPassword" placeholder="Nou password" name="nou_password" required>
    <label for="floatingPassword">Nou password</label>
  </div>
  <div class="form-floating">
    <input type="password" class="form-control" id="floatingPassword" placeholder="Repeteix password" name="repeteix_password" required>
    <label for="floatingPassword">Repeteix Password</label>
  </div>
  <button class="w-100 btn btn-lg btn-primary" type="submit" name="login" value="login">Canviar</button>
</form>
<div class="container">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <div class="col-md-4 d-flex align-items-center">
      <span class="mb-3 mb-md-0 text-muted"><ul>
        <li>&copy; 2023 La Veu Anoia</li>
        <li><a href="https://veuanoia.cat/politica-de-privacitat/">Política de privacitat</li></a>
        <li><a href="https://veuanoia.cat/politica-de-cookies/">Política de cookies</li></a>
        <li>Developed by <a href="https://www.bit-data.es/index.php">Bit-Data</li></a>
      </ul></span>
    </div>
    <ul class="">
      <li class="ms-3"><a class="text-muted" href="https://twitter.com/veuanoia"><img src="../images/xs/twitter.svg" class="bi" width="24" height="24"></a></li>
      <li class="ms-3"><a class="text-muted" href="https://www.instagram.com/veuanoia/"><img src="../images/xs/instagram.svg" class="bi" width="24" height="24"></a></li>
      <li class="ms-3"><a class="text-muted" href="https://www.facebook.com/VeuAnoia/"><img src="../images/xs/facebook.svg" class="bi" width="24" height="24"></a></li>
      <li class="ms-3"><a class="text-muted" href="https://www.linkedin.com/company/la-veu-de-l'anoia/"><img src="../images/xs/linkedin.svg" class="bi" width="24" height="24"></a></li>
      <li class="ms-3"><a class="text-muted" href="https://www.youtube.com/@laveuanoia/videos"><img src="../images/xs/youtube.svg" class="bi" width="24" height="24"></a></li>
  </ul>
  </footer>
</main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
