<?php
            
require('conexion.php');

class AñadirCodigo extends Conexion {


    public function addKey($conn, $post, $usuario){
        echo "<body>";
            echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@8'></script>";
        if (isset($post['codigo'])) {
            
            $codigo = $_POST['codigo'];
          
            $codigoExiste = mysqli_query($conn,"SELECT * from codigo where `nombre` = '$codigo'");
            while($codigoExiste1 = mysqli_fetch_assoc($codigoExiste)){
                $codigoID = $codigoExiste1['id'];
                $codigoUs = $codigoExiste1['usado'];
                $codigoPt = $codigoExiste1['puntos'];
             }

             if (empty($codigoUs)) {

                echo "<script>Swal.fire({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Código introducido incorrecto'
                  })
                  window.setTimeout(function(){

                    window.location.replace('./main.php');
                }, 2000);
                      </script>";

             }elseif($codigoUs==="no"){

                
                $usuarioTodo = mysqli_query($conn,"SELECT * from users where `usuario` = '$usuario'");
                while($usuarioTodo1 = mysqli_fetch_assoc($usuarioTodo)){
                    $usuarioID = $usuarioTodo1['id'];
                    $usuarioNV= $usuarioTodo1['nivel'];
                    $usuarioPT = $usuarioTodo1['puntos'];
                    $usuarioRG = $usuarioTodo1['rango'];
                    $usuarioExp = $usuarioTodo1['nivelExp'];
                    
                 }

                 $rangoTodo = mysqli_query($conn,"SELECT * from rango where `nombre` = '$usuarioRG'");
                while($rangoTodo1 = mysqli_fetch_assoc($rangoTodo)){
                    $rangoNombre= $rangoTodo1['nombre'];
                    $rangoPM = $rangoTodo1['puntosMinimos'];
    
                 }

                 $puntos =  $usuarioPT + $codigoPt;

               
                 $Update_usu = mysqli_query($conn, "UPDATE `users` SET `puntos` = '$puntos' WHERE `usuario` = '$usuario'");

                 if ($puntos >= $rangoPM) {
                     
                  
                    if ($rangoNombre == "Bronce") {

                        mysqli_query($conn, "UPDATE `users` SET `rango` = 'Plata', `puntos` = 0   WHERE `usuario` = '$usuario'");

                    }if ($rangoNombre == "Plata") {
                        mysqli_query($conn, "UPDATE `users` SET `rango` = 'Oro', `puntos` = 0 WHERE `usuario` = '$usuario'");

                   
                    }else {
                        
                    }
                 }
    
                 mysqli_query($conn, "INSERT INTO `codxusuario` (`id`, `idcodigo`, `idusuario`) VALUES (NULL, '$codigoID', '$usuarioID')");
                 


                 $nivelTodo = mysqli_query($conn,"SELECT * from nivel where `nivel` = '$usuarioNV'");
                 while($nivelTodo1 = mysqli_fetch_assoc($nivelTodo)){
                    $expNecesaria = $nivelTodo1['exp'];
                  }

                  $expAhora = $usuarioExp + 1;
           
                if ($expAhora >= $expNecesaria) {
                
                    $usuarion1 =  $usuarioNV +1;

                        if ($usuarion1>10) {
                            
                        } else{

                            mysqli_query($conn, "UPDATE `users` SET `nivel` = $usuarion1, nivelExp = '0'   WHERE `usuario` = '$usuario'");     
                        }                  

                    }else{
                            mysqli_query($conn, "UPDATE `users` SET `nivelExp` = $expAhora   WHERE `usuario` = '$usuario'");
                }

                    echo "<script>
                            Swal.fire({
                        type: 'success',
                        title: 'Genial!',
                        text: 'Código Correcto!',
                        })
                        window.setTimeout(function(){

                            window.location.replace('./main.php');
                        }, 2000);
                        </script>";
                    
                 

            }else{
                    echo "<script>Swal.fire({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Código introducido ya usado!'
                    
                    })window.setTimeout(function(){

                        window.location.replace('./main.php');
                    }, 2000);   
                        </script>";
                
            }
        }
        

    }


}