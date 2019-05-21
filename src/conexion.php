<?php  


class Conexion{

        function __construct(){
        }

        public function conectar(){

        $conexion = new mysqli('127.0.0.1','root','','proyectointegrado');
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        
        }

        return $conexion;
        
    }

    public function comprobarSession($session){
        
        if(!isset($session)){
            header("Location: login.php");
            exit();
             }
        
    }


}