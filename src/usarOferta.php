<?php 

class UsarOferta extends conexion{


    public function comprarOferta($conn,$id,$usuario,$rango,$puntos){
        
        echo "<body>";
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@8'></script>";

    $selectOferta1 = mysqli_query($conn,"SELECT * from `ofertas` where `id`  = $id");
    while ($infoOferta = mysqli_fetch_assoc($selectOferta1)) {
        $nombreO = $infoOferta['nombre'];
        $descripcionO = $infoOferta['descripcion'];
        $imagenO = $infoOferta['imagen'];
        $precioO = $infoOferta['precio'];
        $rangoO = $infoOferta['rango'];
    }
    
        if ($rangoO == "Bronce") {

            if ($puntos >= $precioO) {
                
                $puntosUsuario = $puntos - $precioO;
                $puntosUpdate = mysqli_query($conn,"UPDATE `users` SET `puntos` = $puntosUsuario WHERE `usuario` ='$usuario'");
                $dateNow = date("Y-m-d H:i:s");     

                echo $nombreO."<br>".$descripcionO."<br>"."<img src='./$imagenO'>"."Fecha de activación".$dateNow;

                
            }else {

                echo "<script>Swal.fire({
                    type: 'error',
                    title: 'Oops...',
                    text: 'No tienes suficentes puntos.'
                  })
                  window.setTimeout(function(){

                    window.location.replace('./main.php');
                }, 2000);
                      </script>";
            
            }

         
        }elseif ($rangoO == "Plata") {

          


            if ($rango != "Bronce") {

                if ($puntos >= $precioO) {
                    
            

                        $puntosUsuario = $puntos - $precioO;
                        $puntosUpdate = mysqli_query($conn,"UPDATE `users` SET `puntos` = $puntosUsuario WHERE `usuario` ='$usuario'");
                        $dateNow = date("Y-m-d H:i:s");  
                        echo $nombreO."<br>".$descripcionO."<br>"."<img src='./$imagenO'>"."Fecha de activación". $dateNow;   
                        
                       
                    
                }else {
                    echo "<script>Swal.fire({
                        type: 'error',
                        title: 'Oops...',
                        text: 'No tienes suficentes puntos.'
                      })
                      window.setTimeout(function(){
    
                        window.location.replace('./main.php');
                    }, 2000);
                          </script>";
                
                }
    
               
            }elseif ($rango == "Bronce") {

                echo "<script>Swal.fire({
                    type: 'error',
                    title: 'Oops...',
                    text: 'No tienes el rango requerido o superior.'
                  })
                  window.setTimeout(function(){

                    window.location.replace('./main.php');
                }, 2000);
                      </script>";

               
            
            }

        }elseif ($rangoO == "Oro") {


            
            if ($rango == "Oro") {

                if ($puntos >= $precioO) {

                    
                    $puntosUsuario = $puntos - $precioO;
                    $puntosUpdate = mysqli_query($conn,"UPDATE `users` SET `puntos` = $puntosUsuario WHERE `usuario` ='$usuario'");
                    $dateNow = date("Y-m-d H:i:s");   
                    echo $nombreO."<br>".$descripcionO."<br>"."<img src='./$imagenO'>"."Fecha de activación".$dateNow;  
                    
               
                }else {

                    echo "<script>Swal.fire({
                        type: 'error',
                        title: 'Oops...',
                        text: 'No tienes suficentes puntos.'
                      })
                      window.setTimeout(function(){
    
                        window.location.replace('./main.php');
                    }, 2000);
                          </script>";
                
                
                }
    
               
            }elseif ($rango != "Oro") {

                echo "<script>Swal.fire({
                    type: 'error',
                    title: 'Oops...',
                    text: 'No tienes el rango requerido o superior.'
                  })
                  window.setTimeout(function(){

                    window.location.replace('./main.php');
                }, 2000);
                      </script>";
                
                
            
            }

        }


    }

}