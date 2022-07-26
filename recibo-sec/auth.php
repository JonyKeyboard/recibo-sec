<?php 
  require_once("globals.php");
  require_once("db.php");
  require_once("models/Message.php");

$message = new Message($BASE_URL);

$flassMessage = $message->getMessage();

if(!empty($flassMessage["msg"])){
  $message->clearMessage();
}
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Recibo-Sec</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.css">

</head>
<body class="login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Recibo-</b>Sec</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Autenticação de Usuário</p>

      <form action="<?= $BASE_URL ?>auth_process.php" method="POST">
        <input type="hidden" name="type" value="login">
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <button type="submit" class="btn btn-primary btn-block">Entrar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>
