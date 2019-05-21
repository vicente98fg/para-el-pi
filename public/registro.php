<?php

require_once('../src/registro.php');

if (!empty($_POST)) {
    $conexion = new Conexion();
    $conexion = $conexion->conectar();

    $registro = new Registro();
    $registro = $registro->registrar($conexion,$_POST);


}else{
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/estiloRegistro.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro</title>
  </head>
  <body>
  <div id="cajaimagen">
      <img src="./img/florida.png" alt="">
    </div>
    <form id="registro" action="" method="POST" name="registro" >
    <div class="texto">
        Usuario
        <input type="text" name="usuario" value="" required><br><br><br>
        Nombre
        <input type="text" name="nombre" value="" required><br><br><br>
        Apellidos
        <input type="text" name="apellido" value="" required><br><br><br>
        DNI
        <input type="text" name="dni" value="" required><br><br><br>
        E-mail
        <input type="email" name="email" value="" required><br><br><br>
        Estudios
        <select name="estudios"  >
          <option selected>DAW</option>
          <option>3D</option>
          <option>ASIR</option>
          <option>DAM</option>
        </select><br><br>
        Contraseña
        <input type="password" name="contraseña" value="" required><br><br><br>
        Repetir contraseña
        <input type="password" name="contraseña2" value="" required><br><br><br>
        <input type="submit" value="Enviar" class="boton" />
        <a href="index.php"> <input type="button" value="Volver" class="boton" /></a><br><br><br>
      </div>
    </form>
  </body>
</html>
<?php }  ?>
