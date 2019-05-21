<?php
include('../src/login.php');
  if (!empty($_POST)) {
    $conexion = new Conexion();
    $conexion = $conexion->conectar();
    $login = new Login();
    $login = $login->iniciarSesion($conexion,$_POST);
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="./css/estiloLogin.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>

    <div id="fondo">
        <div class="div1">
        <a href="index.php"><img src="./img/florida.png"></a>
        </div>
        <div class="div2">
          <form method="post" action="  ">
            <p><label id="dni">Usuario</label></p>
            <p><input id="dni_txt" name="usuario" type="text"></p>
            <p><label id="psw">Contraseña</label></p>
            <p><input id="psw_txt" name="password" type="password"></p>
            <div class="div3">
            <a href="recuperarContraseña.php" id="fr_pw">¿Has olvidado tu contraseña?</a>
          <input class="submit" type="submit" value="Login">
            </div>
          </form>
        </div>
    </div>
    </body>
</html>