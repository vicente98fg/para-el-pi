<?php

require_once('conexion.php');

Class InfoUsuario extends Conexion {

        public $info; 

        public function usuarioInfo($conn,$usuario){

                $queryUsuario = mysqli_query($conn,"SELECT * FROM `users` where `usuario` = '$usuario'");
                while($queryUsuario1 = mysqli_fetch_assoc($queryUsuario)){
                        $nombre = $queryUsuario1['nombre'];
                        $apellido = $queryUsuario1['apellido'];
                        $estudios = $queryUsuario1['estudios'];
                        $email = $queryUsuario1['email'];
                        $nivel =  $queryUsuario1['nivel'];
                        $puntos = $queryUsuario1['puntos'];
                        $rango = $queryUsuario1['rango'];
                        $nivelExp = $queryUsuario1['nivelExp'];
                        $dni = $queryUsuario1['dni'];
                        
                }

                $queryUsuario2 = mysqli_query($conn,"SELECT * FROM `rango` where `nombre` = '$rango'");
                while($queryUsuario3 = mysqli_fetch_assoc($queryUsuario2)){
                        $nombreR = $queryUsuario3['nombre'];
                        $puntosMin =  $queryUsuario3['puntosMinimos'];
                        $img =  $queryUsuario3['img'];
                       
                }

                $queryOfertas = mysqli_query($conn,"SELECT * FROM `ofertas`");
                while($queryOfertas1 = mysqli_fetch_assoc($queryOfertas)){
                        $ofertasN[] = $queryOfertas1['nombre'];
                        $ofertasD[] =  $queryOfertas1['descripcion'];
                        $ofertasImg[]  =  $queryOfertas1['imagen'];
                        $ofertasPrecio[]  =  $queryOfertas1['precio'];
                        $ofertasRango[]     =  $queryOfertas1['rango'];
                       
                }

                $arrayInfo = array();
                $arrayInfoPush =array_push($arrayInfo,  $nombre , $apellido, $estudios,$email,  $nivel,  $puntos,   $nivelExp,  $rango,$dni ,$nombreR ,$puntosMin, $img, $ofertasN,$ofertasD,$ofertasImg,$ofertasPrecio,$ofertasRango ); 
                return  $arrayInfo;
        }

        public function getInfo($info){

                return $this->$info;
               
        }
}