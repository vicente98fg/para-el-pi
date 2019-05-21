<?php

require_once('conexion.php');
class Registro extends Conexion{

      
    function __construct(){

    }

    public function registrar($conn, $post){
        echo "<body>";
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@8'></script>";
        
        if ((isset($post['nombre']))&&(isset($post['usuario']))&&(isset($post['apellido']))&&(isset($post['dni']))&&(isset($post['estudios']))&&(isset($post['contraseña']))&&(isset($post['contraseña2']))) {

            $contraseña = $post['contraseña'];
            $contraseña2 = $post['contraseña2'];
                if ($contraseña == $contraseña2) {
                    $nombre = $post['nombre'];
                    $usuario = $post['usuario'];
                    $apellido = $post['apellido'];
                    $dni = $post['dni'];
                    $estudios = $post['estudios'];
                    $email = $post['email'];
                    $contraseña = sha1($contraseña);

                    if($insertar =  mysqli_query($conn, "INSERT INTO `users` (`id`, `nombre`, `apellido`, `usuario`, `email`, `estudios`, `password`, `nivel`, `puntos`, `Registro`, `rango`, `nivelExp`, `dni`) VALUES (NULL, '$nombre', '$apellido', '$usuario', '$email', '$estudios', '$contraseña', '1', '0', CURRENT_TIMESTAMP, 'Bronce', '1', '$dni')")){
                        echo "<script>
                            Swal.fire({
                            type: 'success',
                            title: 'Genial!',
                            text: 'Código Correcto!',
                        })
                            </script>";
                    }else{
                        echo "<script>Swal.fire({
                            type: 'error',
                            title: 'Oops...',
                            text: 'Una cuenta con este nombre de usuario/dni ya existe'
                          })
                              </script>";
                    }
       
                  
                   
                }else{

                    echo "<script>Swal.fire({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Las contraseñas no coinciden'
                      })
                          </script>";
                }
               

            }else{

                echo "<script>Swal.fire({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Algo ha fallado. Verifica todos los campos.'
                  })
                      </script>";
            }

    }


}
