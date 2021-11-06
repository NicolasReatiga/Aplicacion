<?php
    class Conexion{
        public static function Conectar(){
            define('servidor', 'localhost');
            define('name_bd' , 'gestor-e');
            define('usuario' , 'root');
            define('password', '');

            $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

            try{
                $conexion = new PDO("mysql:host=".servidor.";dbname=".name_bd, usuario, password, $opciones);
                return $conexion;
            }catch (Exception $e){
                die("El error de conexión es: " .$e->getMessage());
            }
        }
    }
?>