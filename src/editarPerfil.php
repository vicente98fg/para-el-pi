<?php

require_once('conexion.php');

Class editPerfil extends Conexion {

        public function editarPerfil($conn, $post, $usuario){
          echo "<body>";  
          echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@8'></script>";
            if ((!empty($post['nombre']))&&(!empty($post['apellidos']))&&(!empty($post['email']))&&(!empty($post['dni']))&&(!empty($post['estudios']))) {


              $nombre = $post['nombre'];
              $apellidos = $post['apellidos'];
              $email = $post['email'];
              $dni = $post['dni'];
              $estudios = $post['estudios'];

              if ($actualizar = mysqli_query($conn, "UPDATE users SET nombre='$nombre', apellido='$apellidos', email='$email', dni='$dni', estudios='$estudios' WHERE usuario='$usuario'")) {
                
                  echo "<script>Swal.fire({
                    type: 'success',
                    title: 'Genial!',
                    text: 'Datos actualizados!',
                })
                
                window.setTimeout(function(){

                  window.location.replace('./perfil.php');
              }, 2000);
               </script>";
              } else {

                echo "<script>Swal.fire({
                  type: 'error',
                  title: 'Oops...',
                  text: 'Problemas al actulizar los datos, algun campo en blanco.'
                })
              
              window.setTimeout(function(){

                window.location.replace('./perfil.php');
            }, 2000);
             </script>";
           
              
            }
        }else{
          echo "<script>Swal.fire({
            type: 'error',
            title: 'Oops...',
            text: 'Problemas al actulizar los datos, algun campo en blanco.'
          })
        
        window.setTimeout(function(){

          window.location.replace('./perfil.php');
      }, 2000);
       </script>";
        }
  } 

} 