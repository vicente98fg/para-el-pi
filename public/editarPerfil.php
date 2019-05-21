<?php
require_once('../src/editarPerfil.php');
require_once('../src/infoUsuario.php');
  $conexion = new Conexion();
  $bbdd = $conexion->conectar();
  $session = $conexion->comprobarSession($_SESSION["usuario"]);
  $infou = new InfoUsuario();
  $setInfo = $infou -> usuarioInfo($bbdd, $_SESSION["usuario"]);
  if(!empty($_POST)){
    $editar = new editPerfil();
    $setEditar = $editar->editarPerfil($bbdd,$_POST,$_SESSION["usuario"]);
  }else{
?>


<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Editar Perfil</title>
    <link rel="stylesheet" href="./css/editarPerfil.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
    <div class="izq">
    <img id="florida" src="./img/florida.png" alt="">
    <img id="fotoPerfil" src="./img/user.jpg"/>
    <form class="" action="" method="post">
      <p> Nombre
      <input type="text" name="nombre" value=<?php echo $setInfo[0]?> /> </p>
      <p> Apellidos
      <input type="text" name="apellidos" value=<?php echo $setInfo[1]?>/> </p>
      <p> Correo
      <input type="email" name="email" value=<?php echo $setInfo[3]?> /> </p>
      <p> DNI
      <input type="text" name="dni" value=<?php echo $setInfo[8]?> /> </p>
      <p> Estudios
      <input type="text" name="estudios" value=<?php echo $setInfo[2]?> /> </p>
      <input type="submit" value="Guardar" /><br><br>
        <a href="perfil.php"> <input type="button" value="Volver" /></a>
    </form>
  </div>
  </body>
</html>
<?php } ?>