<?php


$conexion = new mysqli("localhost", "root", "", "proyectointegrado");
if ($conexion->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
}

for ($i=0; $i < 120000 ; $i++) { 

$n = 18;
$chars = "qwertyuiopasdfghjklzxcvbm123456789QWERTYUIOPASDFGHJKLZXCVBNM123456789";
$res = "";
for ($i = 0; $i < $n; $i++) {
    $res .= $chars[mt_rand(0, strlen($chars)-1)];
}
$res2 = ($res);
var_dump($res2);
mysqli_query($conexion, "INSERT INTO `codigo` (`nombre`) VALUES ( '$res2')");


}

//

