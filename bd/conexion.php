<?php 
class Conexion{   
    public static function Conectar() {        
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