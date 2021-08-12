<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$_POST = json_decode(file_get_contents("php://input"), true);
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$cultivo_id = (isset($_POST['cultivo_id'])) ? $_POST['cultivo_id'] : '';
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
$epcS2Ciclo = (isset($_POST['epcS2Ciclo'])) ? $_POST['epcS2Ciclo'] : '';
$semVar01 = (isset($_POST['semVar01'])) ? $_POST['semVar01'] : '';
$semVar02 = (isset($_POST['semVar02'])) ? $_POST['semVar02'] : '';
$semVar03 = (isset($_POST['semVar03'])) ? $_POST['semVar03'] : '';
$semVar04 = (isset($_POST['semVar04'])) ? $_POST['semVar04'] : '';
$semVar05 = (isset($_POST['semVar05'])) ? $_POST['semVar05'] : '';
$semVar06 = (isset($_POST['semVar06'])) ? $_POST['semVar06'] : '';
$semHib01 = (isset($_POST['semHib01'])) ? $_POST['semHib01'] : '';
$semHib02 = (isset($_POST['semHib02'])) ? $_POST['semHib02'] : '';
$semHib03 = (isset($_POST['semHib03'])) ? $_POST['semHib03'] : '';
$semHib04 = (isset($_POST['semHib04'])) ? $_POST['semHib04'] : '';
$semHib05 = (isset($_POST['semHib05'])) ? $_POST['semHib05'] : '';
$semHib06 = (isset($_POST['semHib06'])) ? $_POST['semHib06'] : '';
$semHib07 = (isset($_POST['semHib07'])) ? $_POST['semHib07'] : '';
$semHib08 = (isset($_POST['semHib08'])) ? $_POST['semHib08'] : '';
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
        $consulta = "INSERT INTO cultivos (Nombrec, TempMin, TempMax, TempOpt, diasGerm, germDiaHora, germNocheHora, humRel, humMin, humMax, epcS1Ciclo, epcS2Ciclo, semVar01, semVar02, semVar03, semVar04, semVar05, semVar06, semHib01, semHib02, semHib03, semHib04, semHib05, semHib06, semHib07, semHib08, sPFTextura, sPFEsctructura, sPFGranulometro, sPQNitrogeno, sPQFosforo, sPQPotasio, sPQCalcio, spQPH, sPM01, sPM02) VALUES('$Nombrec','$TempMin','$TempMax','$TempOpt','$diasGerm','$germDiaHora','$germNocheHora','$humRel','$humMin','$humMax','$epcS1Ciclo','$epcS2Ciclo','$semVar01','$semVar02','$semVar03','$semVar04','$semVar05','$semVar06','$semHib01','$semHib02','$semHib03','$semHib04','$semHib05','$semHib06','$semHib07','$semHib08','$sPFTextura','$sPFEsctructura','$sPFGranulometro','$sPQNitrogeno','$sPQFosforo','$sPQPotasio','$sPQCalcio','$spQPH','$sPM01','$sPM02') ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                
        break;
    case 2:
        $consulta = "UPDATE cultivos SET Nombrec='$Nombrec', TempMin='$TempMin', TempMax='$TempMax', TempOpt='$TempOpt', diasGerm='$diasGerm', germDiaHora='$germDiaHora', germNocheHora='$germNocheHora', humRel='$humRel', humMin='$humMin', humMax='$humMax', epcS1Ciclo='$epcS1Ciclo', epcS2Ciclo='$epcS2Ciclo', semVar01='$semVar01', semVar02='$semVar02', semVar03='$semVar03', semVar04='$semVar04', semVar05='$semVar05', semVar06='$semVar06', semHib01='$semHib01', semHib02='$semHib02', semHib03='$semHib03', semHib04='$semHib04', semHib05='$semHib05', semHib06='$semHib06', semHib07='$semHib07', semHib08='$semHib08', sPFTextura='$sPFTextura', sPFEsctructura='$sPFEsctructura', sPFGranulometro='$sPFGranulometro', sPQNitrogeno='$sPQNitrogeno', sPQFosforo='$sPQFosforo', sPQPotasio='$sPQPotasio', sPQCalcio='$sPQCalcio', spQPH='$spQPH', sPM01='$sPM01', sPM02='$sPM02' WHERE cultivo_id='$cultivo_id' ";      
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 3:
        $consulta = "DELETE FROM cultivos WHERE cultivo_id='$cultivo_id' ";     
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;         
    case 4:
        $consulta = "SELECT cultivo_id, Nombrec, TempMin, TempMax, TempOpt, diasGerm, germDiaHora, germNocheHora, humRel, humMin, humMax, epcS1Ciclo, epcS2Ciclo, semVar01, semVar02, semVar03, semVar04, semVar05, semVar06, semHib01, semHib02, semHib03, semHib04, semHib05, semHib06, semHib07, semHib08, sPFTextura, sPFEsctructura, sPFGranulometro, sPQNitrogeno, sPQFosforo, sPQPotasio, sPQCalcio, spQPH, sPM01, sPM02 FROM cultivos";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}
print json_encode($data, JSON_UNESCAPED_UNICODE);
$conexion = NULL;