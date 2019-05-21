<?php
require_once('../src/addKey.php');
require_once('../src/infoUsuario.php');
require_once('../src/ofertas.php');

$conexion = new Conexion();
$bbdd = $conexion->conectar();
$session = $conexion->comprobarSession($_SESSION["usuario"]);

$infou = new InfoUsuario();
$setInfo = $infou -> usuarioInfo($bbdd, $_SESSION["usuario"]);   
if(isset($_POST)){
    $AñadirCodigo = new AñadirCodigo();
    $AñadirCodigo = $AñadirCodigo->addKey($bbdd,$_POST,$_SESSION["usuario"]);
}


?>
<!DOCTYPE html>
<html>
<head>  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Main</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="./css/estiloMain.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body>

<div id="rojo">

<div id="userInfo">

<div id="exp">
    <div class="nivelinfousuario"><b>Nivel</b> <?php echo  $setInfo[4] ?>  </div>
    <div class="expinfousuario"><b>Experiencia</b> <?php echo  $setInfo[6] ?>  </div></div> 
    <div id="puntosUsuario"><div class="InUsuario"><b>Puntos</b> <br> <?php echo $setInfo[5]?>🔥</div></div>
    <div id="nivel"><div class="inNivel"><b>Rango</b> <br> <?php echo $setInfo[9] ?>  </div><img id="bronceM" src="./<?php echo $setInfo[11]?>"></div>
<a href="perfil.php"><img class="userimgR" src="img/user.jpg" id="userimg"></a>
</div>
</div>
<div id="form">
<form id="intCodigo" action="" method="POST" name="codigo" >
    <p class="tituloForm"><b>Introducir Código</b></p>
    <input type="text" class="codigoInput" name="codigo" placeholder="1eXs1d8Ya8aReJd" required>
    <input type="submit" class="validarInput" value="Validar">
    <div id="info">
    <p class="rojo">El codigo fue usado/no es valido. <span class="verde">El codigo es correcto</span></p>
</div>
</form>

</div>
<div id="ofertas">
<div id="ofertabronce">
    <h2>Ofertas Bronce 🔓</h2>
    <hr width="95%" />
    <?php
    $ofertas = new Ofertas();
    $ofertaB = $ofertas->bronce($bbdd);

    ?>


</div>
<?php if ($setInfo[9] == "Plata"):

   ?>
<div id="ofertasplata">
<h2>Ofertas Plata 🔓 </h2>
<hr width="95%" />
<?php $ofertaP = $ofertas->plata($bbdd); ?>
</div>
<?php
endif; ?>
<?php  if ($setInfo[9] == "Oro"){ ?>
<div id="ofertasplata">
<h2>Ofertas Plata 🔓 </h2>
<hr width="95%" />
<br>
    <?php  $ofertaP = $ofertas->plata($bbdd); ?>
</div>
<div id="ofertasoro">
<h2>Ofertas Oro 🔓</h2>
<hr width="95%" />

    <?php

    $ofertaO = $ofertas->oro($bbdd);

    ?>
</div>
<?php } ?>
</div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    

</html>
