<?php

    define('DB_SERVER', '127.0.0.1');
    define('DB_USERNAME', 'cp37c4ac995');
    define('DB_PASSWORD', '49a5095bbdef747565cf7f11a0a33554c631f9a3');
    define('DB_NAME', 'cp37c4ac995');

    $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if($link === false){
        die("ERROR EN LA CONEXION" . mysqli_connect_error());
    }

    //Segunda conexión a la Base de Datos para obtener los datos de la tabla Tomate.php
    class conex{
        public static function con()
        {
            define('servidor', '127.0.0.1');
            define('nombre_bd', 'cp37c4ac995');
            define('usuario', 'cp37c4ac995');
            define('password', '49a5095bbdef747565cf7f11a0a33554c631f9a3');                         
            $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');            
            try{
                $conexion = new PDO("mysql:host=".servidor."; dbname=".nombre_bd, usuario, password, $opciones);            
                return $conexion;
            }catch (Exception $e){
                die("El error de Conexión es: ". $e->getMessage());
            }

        }
    }
?>