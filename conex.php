<?php
class conex //CLASE PARA CONEXION A BASE DE DATOS
{
    public static function con()
    {
        $conexion = mysqli_connect("127.0.0.1", "cp37c4ac995", "49a5095bbdef747565cf7f11a0a33554c631f9a3");
        mysqli_select_db($conexion,"cp37c4ac995");
        mysqli_query($conexion,"SET NAMES 'utf8'");
        if(!$conexion)
        {
            return FALSE;
        }
        else
        {
            return $conexion;
            
        }
    }
}
?>