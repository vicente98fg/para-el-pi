<?php
require_once('../src/infoUsuario.php');


$conexion = new Conexion();
$bbdd = $conexion->conectar();
$session = $conexion->comprobarSession($_SESSION["usuario"]);

$infou = new InfoUsuario();
$setInfo = $infou -> usuarioInfo($bbdd, $_SESSION["usuario"]);

?>


<!DOCTYPE html>
<html lang="es" dir="ltr"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <link rel="stylesheet" href="./css/estiloPerfil.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perfil</title>
  </head>
  <body>
    <img id="perfil" src="./img/user.jpg" alt="">
    <div class="info"><b>Usuario: </b> <?php echo$_SESSION["usuario"];?>    <br>
    <i><b>DNI:</b><?php echo $setInfo[8]?></i>
    </div>
    <br>

    <a href="./editarPerfil.php"><input class="boton1" type="submit" name="editarPerfil" value="Editar Perfil"></a>
    <img id="nivel" src="./<?php echo $setInfo[11]?>" alt="">
    <div class="nivel"><b>Nivel</b><br>
    <?php echo $setInfo[7]?></div>
    <div class="puntosAc"><b>Puntos Actuales</b><br>
    <?php echo $setInfo[5]?></</div>
    <div class="puntosNe"><b>Puntos necesarios siguiente nivel</b><br>
    <?php $diferencia=$setInfo[10]-$setInfo[5]; echo $diferencia; ?></div>
    <div class="ProcesoNivel"><b>Proceso de nivel:</b><br><?php  $total = $setInfo[5]*100/$setInfo[10]; echo $total;
    ?>%</div>
    <progress max="100" value="<?php echo $total ?>"></progress><br>
  <a href="./main.php"><input class="boton2" type="submit" name="volver" value="Volver"></a>
  <br>
  <div class="adInfo"><b>Información Adicional</b><br></div>
  <div id="centro">
  <p>
    </p><p><b>Nombre</b>:<?php echo $setInfo[0]  ?></p>
    <p><b>Apellidos</b>: <?php echo $setInfo[1] ?></p>
    <p><b>Estudios</b>: <?php echo $setInfo[2] ?></p>
    <p><b>Correo</b>:<?php echo $setInfo[3] ?></p>
  </p>
    </div>


</body></html>
