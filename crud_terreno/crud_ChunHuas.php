<?php
include_once '../conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$_POST = json_decode(file_get_contents("php://input"), true);
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';
$Nombrec = (isset($_POST['Nombrec'])) ? $_POST['Nombrec'] : '';
$TempMin = (isset($_POST['TempMin'])) ? $_POST['TempMin'] : '';
$TempMax = (isset($_POST['TempMax'])) ? $_POST['TempMax'] : '';
$TempOpt = (isset($_POST['TempOpt'])) ? $_POST['TempOpt'] : '';
$diasGerm = (isset($_POST['diasGerm'])) ? $_POST['diasGerm'] : '';
$germDiaHora = (isset($_POST['germDiaHora'])) ? $_POST['germDiaHora'] : '';
$germNocheHora = (isset($_POST['germNocheHora'])) ? $_POST['germNocheHora'] : '';
$humRel = (isset($_POST['humRel'])) ? $_POST['humRel'] : '';
$humMin = (isset($_POST['humMin'])) ? $_POST['humMin'] : '';
$humMax = (isset($_POST['humMax'])) ? $_POST['humMax'] : '';
$epcS1Ciclo = (isset($_POST['epcS1Ciclo'])) ? $_POST['epcS1Ciclo'] : '';
$semVar01 = (isset($_POST['semVar01'])) ? $_POST['semVar01'] : '';
$sPFTextura = (isset($_POST['sPFTextura'])) ? $_POST['sPFTextura'] : '';
$sPFEsctructura = (isset($_POST['sPFEsctructura'])) ? $_POST['sPFEsctructura'] : '';
$sPFGranulometro = (isset($_POST['sPFGranulometro'])) ? $_POST['sPFGranulometro'] : '';
$sPQNitrogeno = (isset($_POST['sPQNitrogeno'])) ? $_POST['sPQNitrogeno'] : '';
$sPQFosforo = (isset($_POST['sPQFosforo'])) ? $_POST['sPQFosforo'] : '';
$sPQPotasio = (isset($_POST['sPQPotasio'])) ? $_POST['sPQPotasio'] : '';
$sPQCalcio = (isset($_POST['sPQCalcio'])) ? $_POST['sPQCalcio'] : '';
$spQPH = (isset($_POST['spQPH'])) ? $_POST['spQPH'] : '';
$sPM01 = (isset($_POST['sPM01'])) ? $_POST['sPM01'] : '';
$sPM02 = (isset($_POST['sPM02'])) ? $_POST['sPM02'] : '';

switch($opcion){
    case 1:
        $consulta = "INSERT INTO chunhuas (Nombrec, TempMin, TempMax, TempOpt, diasGerm, germDiaHora, germNocheHora, humRel, humMin, humMax, epcS1Ciclo, semVar01, sPFTextura, sPFEsctructura, sPFGranulometro, sPQNitrogeno, sPQFosforo, sPQPotasio, sPQCalcio, spQPH, sPM01, sPM02) VALUES('$Nombrec','$TempMin', '$TempMax','$TempOpt', '$diasGerm','$germDiaHora','$germNocheHora','$humRel','$humMin','$humMax','$epcS1Ciclo','$semVar01','$sPFTextura','$sPFEsctructura','$sPFGranulometro','$sPQNitrogeno','$sPQFosforo','$sPQPotasio','$sPQCalcio','$spQPH','$sPM01','$sPM02') ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                
        break;
    case 2:
        $consulta = "UPDATE chunhuas SET Nombrec='$Nombrec', TempMin='$TempMin', TempMax='$TempMax', TempOpt='$TempOpt', diasGerm='$diasGerm', germDiaHora='$germDiaHora', germNocheHora='$germNocheHora', humRel='$humRel', humMin='$humMin', humMax='$humMax', epcS1Ciclo='$epcS1Ciclo', semVar01='$semVar01', sPFTextura='$sPFTextura', sPFEsctructura='$sPFEsctructura', sPFGranulometro='$sPFGranulometro', sPQNitrogeno='$sPQNitrogeno', sPQFosforo='$sPQFosforo', sPQPotasio='$sPQPotasio', sPQCalcio='$sPQCalcio', spQPH='$spQPH', sPM01='$sPM01', sPM02='$sPM02'  WHERE id='$id' ";      
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 3:
        $consulta = "DELETE FROM chunhuas WHERE id='$id' ";     
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;         
    case 4:
        $consulta = "SELECT id, Nombrec, TempMin, TempMax, TempOpt, diasGerm, germDiaHora, germNocheHora, humRel, humMin, humMax, epcS1Ciclo, semVar01, sPFTextura, sPFEsctructura, sPFGranulometro, sPQNitrogeno, sPQFosforo, sPQPotasio, sPQCalcio, spQPH, sPM01, sPM02 FROM chunhuas";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}
print json_encode($data, JSON_UNESCAPED_UNICODE);
$conexion = NULL;