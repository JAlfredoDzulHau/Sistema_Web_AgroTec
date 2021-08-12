<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$_POST = json_decode(file_get_contents("php://input"), true);
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';
$Nombre = (isset($_POST['Nombre'])) ? $_POST['Nombre'] : '';
$HumMin = (isset($_POST['HumMin'])) ? $_POST['HumMin'] : '';
$HumOpt = (isset($_POST['HumOpt'])) ? $_POST['HumOpt'] : '';
$HumMax = (isset($_POST['HumMax'])) ? $_POST['HumMax'] : '';

switch($opcion){
    case 1:
        $consulta = "INSERT INTO terreno (Nombre, HumMin, HumOpt, HumMax) VALUES('$Nombre', '$HumMin', '$HumOpt','HumMax') ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                
        break;
    case 2:
        $consulta = "UPDATE terreno SET Nombre='$Nombre', HumMin='$HumMin', HumOpt='$HumOpt', HumMax='$HumMax'  WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 3:
        $consulta = "DELETE FROM terreno WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;         
    case 4:
        $consulta = "SELECT id, Nombre, HumMin, HumOpt, HumMax FROM terreno";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}
print json_encode($data, JSON_UNESCAPED_UNICODE);
$conexion = NULL;