<?php

    session_start();
    $usuario = $_SESSION["user"];    
    $rol = $_SESSION["rol"];

    $id = $_SESSION["id"];
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>AgroTec</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css">
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        
        <link href="https://kit-pro.fontawesome.com/releases/v5.15.1/css/pro.min.css" rel="stylesheet">
        <link rel="shortcut icon" href="images/LogoPlantaTech.png">
        <style>
        table.dataTable thead {
            background: linear-gradient(to right, #1540C6, #1039B8);
            color:white;
        }
    </style>
    </head>
    <body class="sb-nav-fixed">
        
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="bienvenida.php">AgroTec <i class="fas fa-seedling"></i></a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            

            <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $usuario ?><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <?php if($rol == 1){ ?>
                            <a class="dropdown-item" href="usuario/sistema/lista_usuarios.php">Configuración</a>
                            <div class="dropdown-divider"></div>
                        <?php } ?>
                        <a class="dropdown-item" href="cerrar-sesion.php">Salir</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
         <?php include "barra_lateral.php"; ?>

            
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Inicio</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"><a href="bienvenida.php">Inicio</a></li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4" align="center">
                                    <div class="card-body">Total de Cultivos: <br>
                                    <strong><?php
                                    require_once 'config.php';

                                    // Conectarse a MySQL con extensión MySQLi 
                                    $mysqli = new mysqli($hostname, $username, $password, $database);
                                    if ($mysqli->connect_errno) {
                                        echo "¡Error! > (" .$mysqli->connect_errno .")";
                                        die();
                                    } else {
                                        $sql = "SELECT COUNT(*) total FROM cultivos";
                                        $result = mysqli_query($mysqli, $sql);
                                        $fila = mysqli_fetch_assoc($result);
                                        echo $fila['total']. ' Cultivos';  
                                    }

                                    ?></strong>
                                    </div><div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="big text-white stretched-link" href="Cultivo.php">Ver Detalles</a>
                                        <div class="big text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-dark mb-4" align="center" style="color:red;">
                                    <div class="card-body">Total de Terrenos: <br>
                                    <strong><?php
                                    require_once 'config.php';

                                    // Conectarse a MySQL con extensión MySQLi 
                                    $mysqli = new mysqli($hostname, $username, $password, $database);
                                    if ($mysqli->connect_errno) {
                                        echo "¡Error! > (" .$mysqli->connect_errno .")";
                                        die();
                                    } else {
                                        $sql = "SELECT COUNT(*) total FROM dat_terrenos";
                                        $result = mysqli_query($mysqli, $sql);
                                        $fila = mysqli_fetch_assoc($result);
                                        echo $fila['total']. ' Terrenos';  
                                    }

                                    ?></strong>
                                    </div>

                                    <!-- <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="nav-link collapsed text-dark" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                Ver Detalles
                                <div class="sb-sidenav-collapse-arrow"></div></a>
                                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">

                                </div><div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div> -->

                                    <div class="card-footer d-flex align-items-center justify-content-between" align="center">
                                        <select  onchange="location = this.options[this.selectedIndex].value;">
                                            <option value="">Ver Detalles: </option>
                                            <option value="T_Becal.php">Becal</option>
                                            <option value="T_Dzitbalché.php">Dzitbalché</option>
                                            <option value="T_Calkiní.php">Calkiní</option>
                                            <option value="T_Helcelchakán.php">Helcelchakán</option>
                                            <option value="T_ChunHuas.php">ChunHuas</option>
                                            <option value="T_Xcolok.php">Xcolok</option>
                                            <option value="T_Tepakan.php">Tepakan</option>
                                            <option value="T_Maxcanu.php">Maxcanu</option>
                                            <option value="T_Halacho.php">Halacho</option>
                                        </select>   
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4" align="center">
                                    <div class="card-body"><br><strong>Terrenos Óptimos</strong><br></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="text-white stretched-link" href="Reportes.php">Ver Detalles</a>
                                        <div class="text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4" align="center">
                                    <div class="card-body"><br><strong>Terrenos con Deficiencia</strong><br></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="text-white stretched-link" href="Reportes.php">Ver Detalles</a>
                                        <div class="text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>

			<!-- Grafico  de Barra y Circular-->
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header"><i class="fas fa-chart-pie mr-1"></i>Datos de: <strong>Tomate</strong> <i class="fas fa-apple-alt"></i></div>
                                    <div class="card-body">
                                        <canvas id="Graficotomate" width="100%" height="40"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header"><i class= "fas fa-chart-bar mr-1"></i>Datos de: <strong>Sandía</strong> <i class="fas fa-apple-crate"></i></div>
                                    <div class="card-body">
                                        <canvas id="Graficosandia" width="100%" height="40"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header"><i class="fas fa-chart-pie mr-1"></i>Datos de: <strong>Calabaza</strong> <i class="fas fa-pumpkin"></i></div>
                                    <div class="card-body">
                                        <canvas id="GraficoCalabaza" width="100%" height="40"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header"><i class="fas fa-chart-pie mr-1"></i>Datos de: <strong>Chihua</strong>  <i class="fas fa-pumpkin"></i></div>
                                    <div class="card-body">
                                        <canvas id="GraficoChihua" width="100%" height="40"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header"><i class="fas fa-chart-pie mr-1"></i>Datos de: <strong>Maíz</strong>  <i class="fas fa-corn"></i></div>
                                    <div class="card-body">
                                        <canvas id="GraficoMaiz" width="100%" height="40"></canvas>
                                    </div>
                                </div>
                            </div>
                             <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header"><i class="fas fa-chart-pie mr-1"></i>Datos de: <strong>Chile Dulce</strong>  <i class="fas fa-pepper-hot"></i></div>
                                    <div class="card-body">
                                        <canvas id="GraficoChileDulce" width="100%" height="40"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header"><i class="fas fa-chart-pie mr-1"></i>Datos de: <strong>Chile Xcatic</strong>  <i class="fas fa-pepper-hot"></i></div>
                                    <div class="card-body">
                                        <canvas id="GraficoChileXcatic" width="100%" height="40"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header"><i class="fas fa-chart-pie mr-1"></i>Datos de: <strong>Chile Habanero</strong>  <i class="fas fa-pepper-hot"></i></div>
                                    <div class="card-body">
                                        <canvas id="GraficoChileHabanero" width="100%" height="40"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
			<!-- Finalización Grafico-->
			
            <!--Tabla de cultivos-->
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i> Tabla de los <strong>CULTIVOS</strong></div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="TablaCultivos" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>NOMBRE</th>
                                                <th>TEMPERATURA MIN °C</th>                                
                                                <th>TEMPERATURA MAX °C</th>  
                                                <th>TEMPERATURA OPT °C</th>
                                                <th>DIAS DE GERMINACIÓN</th>
                                                <th>GERMINACIÓN DIA/HORA</th>
                                                <th>GERMINACIÓN NOCHE/HORA</th>
                                                <th>% HUMEDAD RELATIVA</th>
                                                <th>% HUMEDAD MIN</th>
                                                <th>% HUMEDAD MAX</th>
                                                <th>ÉPOCA DE SIEMBRA 01</th>
                                                <th>ÉPOCA DE SIEMBRA 02</th>
                                                <th>SEMILLA VARIEDAD 01</th>
                                                <th>SEMILLA VARIEDAD 02</th>
                                                <th>SEMILLA VARIEDAD 03</th>
                                                <th>SEMILLA VARIEDAD 04</th>
                                                <th>SEMILLA VARIEDAD 05</th>
                                                <th>SEMILLA VARIEDAD 06</th>
                                                <th>SEMILLA HIBRIDO 01</th>
                                                <th>SEMILLA HIBRIDO 02</th>
                                                <th>SEMILLA HIBRIDO 03</th>
                                                <th>SEMILLA HIBRIDO 04</th>
                                                <th>SEMILLA HIBRIDO 05</th>
                                                <th>SEMILLA HIBRIDO 06</th>
                                                <th>SEMILLA HIBRIDO 07</th>
                                                <th>SEMILLA HIBRIDO 08</th>
                                                <th>TEXTURA DEL SUELO</th>
                                                <th>ESTRUCTURA DEL SUELO</th>
                                                <th>GRANULOMETRO</th>
                                                <th>NITROGENO DEL SUELO</th>
                                                <th>FOSFORO DEL SUELO</th>
                                                <th>POTASIO DEL SUELO</th>
                                                <th>CALCIO DEL SUELO</th>
                                                <th>PH DEL SUELO</th>
                                                <th>PROPIEDAD MICROBIOLOGICA 01</th>
                                                <th>PROPIEDAD MICROBIOLOGICA 02</th>
                                            </tr>
                                        </thead>
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
			<!--Finalizacipon Tabla de cultivos-->

                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i> Tabla de Cultivos en <strong>CALKINI</strong></div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="TablaTerrenos" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>NOMBRE DEL CULTIVO</th>
                                                <th>TEMPERATURA MIN °C</th>                                
                                                <th>TEMPERATURA MAX °C</th>  
                                                <th>TEMPERATURA OPT °C</th>
                                                <th>DIAS DE GERMINACIÓN</th>
                                                <th>GERMINACIÓN DIA/HORA</th>
                                                <th>GERMINACIÓN NOCHE/HORA</th>
                                                <th>% HUMEDAD RELATIVA</th>
                                                <th>% HUMEDAD MIN</th>
                                                <th>% HUMEDAD MAX</th>
                                                <th>ÉPOCA DE SIEMBRA</th>
                                                <th>SEMILLA</th>
                                                <th>TEXTURA DEL SUELO</th>
                                                <th>ESTRUCTURA DEL SUELO</th>
                                                <th>GRANULOMETRO</th>
                                                <th>NITROGENO DEL SUELO</th>
                                                <th>FOSFORO DEL SUELO</th>
                                                <th>POTASIO DEL SUELO</th>
                                                <th>CALCIO DEL SUELO</th>
                                                <th>PH DEL SUELO</th>
                                                <th>PROPIEDAD MICROBIOLOGICA 01</th>
                                                <th>PROPIEDAD MICROBIOLOGICA 02</th>
                                            </tr>
                                        </thead>
                                        
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; AgroTec 2020</div>
                            <div>
                                <a href="#">Politicas de Privacidad</a>
                                &middot;
                                <a href="#">Terminos &amp; Condiciones</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
        
        <!--    Datatables-->
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>
        
        <script>
          $(document).ready(function() {
              $('#TablaCultivos').DataTable( {
                "ajax":{
                    "url": "baseDeDatos/consulta.php",
                    "dataSrc":""
                },
                "columns":[
                    {"data": "Nombrec"},
                    {"data": "TempMin"},
                    {"data": "TempMax"},
                    {"data": "TempOpt"},
                    {"data": "diasGerm"},
                    {"data": "germDiaHora"},
                    {"data": "germNocheHora"},
                    {"data": "humRel"},
                    {"data": "humMin"},
                    {"data": "humMax"},
                    {"data": "epcS1Ciclo"},
                    {"data": "epcS2Ciclo"},
                    {"data": "semVar01"},
                    {"data": "semVar02"},
                    {"data": "semVar03"},
                    {"data": "semVar04"},
                    {"data": "semVar05"},
                    {"data": "semVar06"},
                    {"data": "semHib01"},
                    {"data": "semHib02"},
                    {"data": "semHib03"},
                    {"data": "semHib04"},
                    {"data": "semHib05"},
                    {"data": "semHib06"},
                    {"data": "semHib07"},
                    {"data": "semHib08"},
                    {"data": "sPFTextura"},
                    {"data": "sPFEsctructura"},
                    {"data": "sPFGranulometro"},
                    {"data": "sPQNitrogeno"},
                    {"data": "sPQFosforo"},
                    {"data": "sPQPotasio"},
                    {"data": "sPQCalcio"},
                    {"data": "spQPH"},
                    {"data": "sPM01"},
                    {"data": "sPM02"},
                ]  
              });
          });
        </script>
        <script>
          $(document).ready(function() {
              $('#TablaTerrenos').DataTable( {
                "ajax":{
                    "url": "baseDeDatos/consultaterrenos.php",
                    "dataSrc":""
                },
                "columns":[
                    {"data": "Nombrec"},
                    {"data": "TempMin"},
                    {"data": "TempMax"},
                    {"data": "TempOpt"},
                    {"data": "diasGerm"},
                    {"data": "germDiaHora"},
                    {"data": "germNocheHora"},
                    {"data": "humRel"},
                    {"data": "humMin"},
                    {"data": "humMax"},
                    {"data": "epcS1Ciclo"},
                    {"data": "semVar01"},
                    {"data": "sPFTextura"},
                    {"data": "sPFEsctructura"},
                    {"data": "sPFGranulometro"},
                    {"data": "sPQNitrogeno"},
                    {"data": "sPQFosforo"},
                    {"data": "sPQPotasio"},
                    {"data": "sPQCalcio"},
                    {"data": "spQPH"},
                    {"data": "sPM01"},
                    {"data": "sPM02"},
                ]  
              });
          });
        </script>

    </body>
</html>


<script>
        CargarDatosGraficoBar();
        CargarDatosGraficocalabaza();
        CargarDatosGraficochile();
        CargarDatosGraficosandia();
        CargarDatosGraficomaiz();
        CargarDatosGraficochihua();
        CargarDatosGraficochiledulce();
        CargarDatosGraficochilexcatic();
        CargarDatosGraficochilehabanero();
        /*
        CargarDatosGraficoDoughnut();
        CargarDatosGraficoPie();
        */
        function CargarDatosGraficoBar(){
          
          $.ajax({
                type: "POST",
                url: "controlador_grafico.php",
                dataType: "json",
                success: function (data) {
                    
                    var nombrearray  = [];
                    var tempminarray = [];
                    var tempmaxarray = [];
                    var tempoptarray = [];
                    var humrelarray  = [];
                    var humminarray  = [];
                    var hummaxarray  = [];
                    
                    for (var i = 0; i < data.length; i++) {

                        nombrearray.push(data[i].Nombrec);
                        tempminarray.push(data[i].TempMin);
                        tempmaxarray.push(data[i].TempMax);
                        tempoptarray.push(data[i].TempOpt);
                        humrelarray.push(data[i].humRel);
                        humminarray.push(data[i].humMin);
                        hummaxarray.push(data[i].humMax);
                        
                    }

                    grafico(nombrearray, tempminarray, tempmaxarray, tempoptarray, humrelarray, humminarray, hummaxarray);
                    
                }
            });
        }


        function CargarDatosGraficocalabaza(){
          
          $.ajax({
                type: "POST",
                url: "controlador_graficocalabaza.php",
                dataType: "json",
                success: function (data) {
                    
                    var nombrearray  = [];
                    var tempminarray = [];
                    var tempmaxarray = [];
                    var tempoptarray = [];
                    var humrelarray  = [];
                    var humminarray  = [];
                    var hummaxarray  = [];
                    
                    for (var i = 0; i < data.length; i++) {

                        nombrearray.push(data[i].Nombrec);
                        tempminarray.push(data[i].TempMin);
                        tempmaxarray.push(data[i].TempMax);
                        tempoptarray.push(data[i].TempOpt);
                        humrelarray.push(data[i].humRel);
                        humminarray.push(data[i].humMin);
                        hummaxarray.push(data[i].humMax);
                        
                    }

                    graficocalabaza(nombrearray, tempminarray, tempmaxarray, tempoptarray, humrelarray, humminarray, hummaxarray);
                    
                }
            });
        }



         function CargarDatosGraficochile(){
          
          $.ajax({
                type: "POST",
                url: "controlador_graficochile.php",
                dataType: "json",
                success: function (data) {
                    
                    var nombrearray  = [];
                    var tempminarray = [];
                    var tempmaxarray = [];
                    var tempoptarray = [];
                    var humrelarray  = [];
                    var humminarray  = [];
                    var hummaxarray  = [];
                    
                    for (var i = 0; i < data.length; i++) {

                        nombrearray.push(data[i].Nombrec);
                        tempminarray.push(data[i].TempMin);
                        tempmaxarray.push(data[i].TempMax);
                        tempoptarray.push(data[i].TempOpt);
                        humrelarray.push(data[i].humRel);
                        humminarray.push(data[i].humMin);
                        hummaxarray.push(data[i].humMax);
                        
                    }

                    graficochile(nombrearray, tempminarray, tempmaxarray, tempoptarray, humrelarray, humminarray, hummaxarray);
                    
                }
            });
        }

        function CargarDatosGraficosandia(){
          
          $.ajax({
                type: "POST",
                url: "controlador_graficosandia.php",
                dataType: "json",
                success: function (data) {
                    
                    var nombrearray  = [];
                    var tempminarray = [];
                    var tempmaxarray = [];
                    var tempoptarray = [];
                    var humrelarray  = [];
                    var humminarray  = [];
                    var hummaxarray  = [];
                    
                    for (var i = 0; i < data.length; i++) {

                        nombrearray.push(data[i].Nombrec);
                        tempminarray.push(data[i].TempMin);
                        tempmaxarray.push(data[i].TempMax);
                        tempoptarray.push(data[i].TempOpt);
                        humrelarray.push(data[i].humRel);
                        humminarray.push(data[i].humMin);
                        hummaxarray.push(data[i].humMax);
                        
                    }

                    Graficosandia(nombrearray, tempminarray, tempmaxarray, tempoptarray, humrelarray, humminarray, hummaxarray);
                    
                }
            });
        }

        function CargarDatosGraficomaiz(){
          
          $.ajax({
                type: "POST",
                url: "controlador_graficomaiz.php",
                dataType: "json",
                success: function (data) {
                    
                    var nombrearray  = [];
                    var tempminarray = [];
                    var tempmaxarray = [];
                    var tempoptarray = [];
                    var humrelarray  = [];
                    var humminarray  = [];
                    var hummaxarray  = [];
                    
                    for (var i = 0; i < data.length; i++) {

                        nombrearray.push(data[i].Nombrec);
                        tempminarray.push(data[i].TempMin);
                        tempmaxarray.push(data[i].TempMax);
                        tempoptarray.push(data[i].TempOpt);
                        humrelarray.push(data[i].humRel);
                        humminarray.push(data[i].humMin);
                        hummaxarray.push(data[i].humMax);
                        
                    }

                    Graficomaiz(nombrearray, tempminarray, tempmaxarray, tempoptarray, humrelarray, humminarray, hummaxarray);
                    
                }
            });
        }

        function CargarDatosGraficochihua(){
          
          $.ajax({
                type: "POST",
                url: "controlador_graficochihua.php",
                dataType: "json",
                success: function (data) {
                    
                    var nombrearray  = [];
                    var tempminarray = [];
                    var tempmaxarray = [];
                    var tempoptarray = [];
                    var humrelarray  = [];
                    var humminarray  = [];
                    var hummaxarray  = [];
                    
                    for (var i = 0; i < data.length; i++) {

                        nombrearray.push(data[i].Nombrec);
                        tempminarray.push(data[i].TempMin);
                        tempmaxarray.push(data[i].TempMax);
                        tempoptarray.push(data[i].TempOpt);
                        humrelarray.push(data[i].humRel);
                        humminarray.push(data[i].humMin);
                        hummaxarray.push(data[i].humMax);
                        
                    }

                    GraficoChihua(nombrearray, tempminarray, tempmaxarray, tempoptarray, humrelarray, humminarray, hummaxarray);
                    
                }
            });
        }

        function CargarDatosGraficochiledulce(){
          
          $.ajax({
                type: "POST",
                url: "controlador_graficochiledulce.php",
                dataType: "json",
                success: function (data) {
                    
                    var nombrearray  = [];
                    var tempminarray = [];
                    var tempmaxarray = [];
                    var tempoptarray = [];
                    var humrelarray  = [];
                    var humminarray  = [];
                    var hummaxarray  = [];
                    
                    for (var i = 0; i < data.length; i++) {

                        nombrearray.push(data[i].Nombrec);
                        tempminarray.push(data[i].TempMin);
                        tempmaxarray.push(data[i].TempMax);
                        tempoptarray.push(data[i].TempOpt);
                        humrelarray.push(data[i].humRel);
                        humminarray.push(data[i].humMin);
                        hummaxarray.push(data[i].humMax);
                        
                    }

                    GraficoChiledulce(nombrearray, tempminarray, tempmaxarray, tempoptarray, humrelarray, humminarray, hummaxarray);
                    
                }
            });
        }
        function CargarDatosGraficochilexcatic(){
          
          $.ajax({
                type: "POST",
                url: "controlador_graficochilexcatic.php",
                dataType: "json",
                success: function (data) {
                    
                    var nombrearray  = [];
                    var tempminarray = [];
                    var tempmaxarray = [];
                    var tempoptarray = [];
                    var humrelarray  = [];
                    var humminarray  = [];
                    var hummaxarray  = [];
                    
                    for (var i = 0; i < data.length; i++) {

                        nombrearray.push(data[i].Nombrec);
                        tempminarray.push(data[i].TempMin);
                        tempmaxarray.push(data[i].TempMax);
                        tempoptarray.push(data[i].TempOpt);
                        humrelarray.push(data[i].humRel);
                        humminarray.push(data[i].humMin);
                        hummaxarray.push(data[i].humMax);
                        
                    }

                    GraficoChilexcatic(nombrearray, tempminarray, tempmaxarray, tempoptarray, humrelarray, humminarray, hummaxarray);
                    
                }
            });
        }
        function CargarDatosGraficochilehabanero(){
          
          $.ajax({
                type: "POST",
                url: "controlador_graficochilehabanero.php",
                dataType: "json",
                success: function (data) {
                    
                    var nombrearray  = [];
                    var tempminarray = [];
                    var tempmaxarray = [];
                    var tempoptarray = [];
                    var humrelarray  = [];
                    var humminarray  = [];
                    var hummaxarray  = [];
                    
                    for (var i = 0; i < data.length; i++) {

                        nombrearray.push(data[i].Nombrec);
                        tempminarray.push(data[i].TempMin);
                        tempmaxarray.push(data[i].TempMax);
                        tempoptarray.push(data[i].TempOpt);
                        humrelarray.push(data[i].humRel);
                        humminarray.push(data[i].humMin);
                        hummaxarray.push(data[i].humMax);
                        
                    }

                    GraficoChilehabanero(nombrearray, tempminarray, tempmaxarray, tempoptarray, humrelarray, humminarray, hummaxarray);
                    
                }
            });
        }
        /*
        function CargarDatosGraficoDoughnut(){
            $.ajax({
                url:'controlador_grafico.php',
                type:'POST'
            }).done(function(resp){
                if(resp.length>0){
                    var titulo   = [];
                    var cantidad = [];
                    var colores  = [];
                    var data = JSON.parse(resp);
                    for(var i=0; i<data.length; i++){
                        titulo.push(data[i][0]);
                        cantidad.push(data[i][1]);
                        colores.push(colorRGB());
                    }
                    Creargrafico(titulo, cantidad, colores, 'doughnut', 'GRAFICO DOUGHNUT DE PRODUCTOS', 'GraficoCircular');
                     
                }  
            })
        }

        function CargarDatosGraficoPie(){
            $.ajax({
                url:'controlador_grafico.php',
                type:'POST'
            }).done(function(resp){
                if(resp.length>0){
                    var titulo   = [];
                    var cantidad = [];
                    var colores  = [];
                    var data = JSON.parse(resp);
                    for(var i=0; i<data.length; i++){
                        titulo.push(data[i][0]);
                        cantidad.push(data[i][1]);
                        colores.push(colorRGB());
                    }
                    Creargrafico(titulo, cantidad, colores, 'pie', 'GRAFICO DOUGHNUT DE PRODUCTOS', 'GraficoPie');
                     
                }  
            })
        }
        */    
    
        function grafico(Nombrec, TempMin, TempMax, TempOpt, humRel, humMin, humMax) {


            var ctx = document.getElementById('Graficotomate').getContext('2d');

            var chart = new Chart(ctx, {

                type: 'bar',
                data: {
                    labels: Nombrec,


                    datasets: [{
                        label: 'TempMin',
                        backgroundColor: '#001FFC',
                        borderColor: '#001FFC',
                        data: TempMin
                    },
                    {
                        label: 'TempMax',
                        backgroundColor: '#00FCFC',
                        borderColor: '#00FCFC',
                        data: TempMax

                    },
                    {
                        label: 'TempOpt',
                        backgroundColor: '#36B810',
                        borderColor: '#36B810',
                        data: TempOpt


                    },
                    {
                        label: 'HumRel',
                        backgroundColor: '#B81510',
                        borderColor: '#B81510',
                        data: humRel

                    },
                    {

                        label: 'HumMin',
                        backgroundColor: '#757575',
                        borderColor: '#757575',
                        data: humMin

                    },
                    {

                        label: 'HumMax',
                        backgroundColor: '#FC00D9',
                        borderColor: '#FC00D9',
                        data: humMax
                    }]
                },

                options: {
                    scales: {
                        xAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }



         function graficocalabaza(Nombrec, TempMin, TempMax, TempOpt, humRel, humMin, humMax) {


            var ctx = document.getElementById('GraficoCalabaza').getContext('2d');

            var chart = new Chart(ctx, {

                type: 'bar',
                data: {
                    labels: Nombrec,


                    datasets: [{
                        label: 'TempMin',
                        backgroundColor: '#A603AB',
                        borderColor: '#A603AB',
                        data: TempMin
                    },
                    {
                        label: 'TempMax',
                        backgroundColor: '#010001',
                        borderColor: '#010001',
                        data: TempMax

                    },
                    {
                        label: 'TempOpt',
                        backgroundColor: '#A6FF00',
                        borderColor: '#A6FF00',
                        data: TempOpt


                    },
                    {
                        label: 'HumRel',
                        backgroundColor: '#FFC900',
                        borderColor: '#FFC900',
                        data: humRel

                    },
                    {

                        label: 'HumMin',
                        backgroundColor: '#00FF7C',
                        borderColor: '#00FF7C',
                        data: humMin

                    },
                    {

                        label: 'HumMax',
                        backgroundColor: '#0070FF',
                        borderColor: '#0070FF',
                        data: humMax
                    }]
                },

                options: {
                    scales: {
                        xAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }

        function graficochile(Nombrec, TempMin, TempMax, TempOpt, humRel, humMin, humMax) {


            var ctx = document.getElementById('GraficoChile').getContext('2d');

            var chart = new Chart(ctx, {

                type: 'bar',
                data: {
                    labels: Nombrec,


                    datasets: [{
                        label: 'TempMin',
                        backgroundColor: '#FF0068',
                        borderColor: '#FF0068',
                        data: TempMin
                    },
                    {
                        label: 'TempMax',
                        backgroundColor: '#FF003E',
                        borderColor: '#FF003E',
                        data: TempMax

                    },
                    {
                        label: 'TempOpt',
                        backgroundColor: '#00FF68',
                        borderColor: '#00FF68',
                        data: TempOpt


                    },
                    {
                        label: 'HumRel',
                        backgroundColor: '#00FFFB',
                        borderColor: '#00FFFB',
                        data: humRel

                    },
                    {

                        label: 'HumMin',
                        backgroundColor: '#041048',
                        borderColor: '#041048',
                        data: humMin

                    },
                    {

                        label: 'HumMax',
                        backgroundColor: '#260448',
                        borderColor: '#260448',
                        data: humMax
                    }]
                },

                options: {
                    scales: {
                        xAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }

        function Graficosandia(Nombrec, TempMin, TempMax, TempOpt, humRel, humMin, humMax) {


            var ctx = document.getElementById('Graficosandia').getContext('2d');

            var chart = new Chart(ctx, {

                type: 'bar',
                data: {
                    labels: Nombrec,


                    datasets: [{
                        label: 'TempMin',
                        backgroundColor: '#FF0068',
                        borderColor: '#FF0068',
                        data: TempMin
                    },
                    {
                        label: 'TempMax',
                        backgroundColor: '#FF003E',
                        borderColor: '#FF003E',
                        data: TempMax

                    },
                    {
                        label: 'TempOpt',
                        backgroundColor: '#00FF68',
                        borderColor: '#00FF68',
                        data: TempOpt


                    },
                    {
                        label: 'HumRel',
                        backgroundColor: '#00FFFB',
                        borderColor: '#00FFFB',
                        data: humRel

                    },
                    {

                        label: 'HumMin',
                        backgroundColor: '#041048',
                        borderColor: '#041048',
                        data: humMin

                    },
                    {

                        label: 'HumMax',
                        backgroundColor: '#260448',
                        borderColor: '#260448',
                        data: humMax
                    }]
                },

                options: {
                    scales: {
                        xAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }

        function Graficomaiz(Nombrec, TempMin, TempMax, TempOpt, humRel, humMin, humMax) {


            var ctx = document.getElementById('GraficoMaiz').getContext('2d');

            var chart = new Chart(ctx, {

                type: 'bar',
                data: {
                    labels: Nombrec,


                    datasets: [{
                        label: 'TempMin',
                        backgroundColor: '#FF0068',
                        borderColor: '#FF0068',
                        data: TempMin
                    },
                    {
                        label: 'TempMax',
                        backgroundColor: '#FF003E',
                        borderColor: '#FF003E',
                        data: TempMax

                    },
                    {
                        label: 'TempOpt',
                        backgroundColor: '#00FF68',
                        borderColor: '#00FF68',
                        data: TempOpt


                    },
                    {
                        label: 'HumRel',
                        backgroundColor: '#00FFFB',
                        borderColor: '#00FFFB',
                        data: humRel

                    },
                    {

                        label: 'HumMin',
                        backgroundColor: '#041048',
                        borderColor: '#041048',
                        data: humMin

                    },
                    {

                        label: 'HumMax',
                        backgroundColor: '#260448',
                        borderColor: '#260448',
                        data: humMax
                    }]
                },

                options: {
                    scales: {
                        xAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }

        function GraficoChihua(Nombrec, TempMin, TempMax, TempOpt, humRel, humMin, humMax) {


            var ctx = document.getElementById('GraficoChihua').getContext('2d');

            var chart = new Chart(ctx, {

                type: 'bar',
                data: {
                    labels: Nombrec,


                    datasets: [{
                        label: 'TempMin',
                        backgroundColor: '#FF0068',
                        borderColor: '#FF0068',
                        data: TempMin
                    },
                    {
                        label: 'TempMax',
                        backgroundColor: '#FF003E',
                        borderColor: '#FF003E',
                        data: TempMax

                    },
                    {
                        label: 'TempOpt',
                        backgroundColor: '#00FF68',
                        borderColor: '#00FF68',
                        data: TempOpt


                    },
                    {
                        label: 'HumRel',
                        backgroundColor: '#00FFFB',
                        borderColor: '#00FFFB',
                        data: humRel

                    },
                    {

                        label: 'HumMin',
                        backgroundColor: '#041048',
                        borderColor: '#041048',
                        data: humMin

                    },
                    {

                        label: 'HumMax',
                        backgroundColor: '#260448',
                        borderColor: '#260448',
                        data: humMax
                    }]
                },

                options: {
                    scales: {
                        xAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }

        function GraficoChiledulce(Nombrec, TempMin, TempMax, TempOpt, humRel, humMin, humMax) {


            var ctx = document.getElementById('GraficoChileDulce').getContext('2d');

            var chart = new Chart(ctx, {

                type: 'bar',
                data: {
                    labels: Nombrec,


                    datasets: [{
                        label: 'TempMin',
                        backgroundColor: '#FF0068',
                        borderColor: '#FF0068',
                        data: TempMin
                    },
                    {
                        label: 'TempMax',
                        backgroundColor: '#FF003E',
                        borderColor: '#FF003E',
                        data: TempMax

                    },
                    {
                        label: 'TempOpt',
                        backgroundColor: '#00FF68',
                        borderColor: '#00FF68',
                        data: TempOpt


                    },
                    {
                        label: 'HumRel',
                        backgroundColor: '#00FFFB',
                        borderColor: '#00FFFB',
                        data: humRel

                    },
                    {

                        label: 'HumMin',
                        backgroundColor: '#041048',
                        borderColor: '#041048',
                        data: humMin

                    },
                    {

                        label: 'HumMax',
                        backgroundColor: '#260448',
                        borderColor: '#260448',
                        data: humMax
                    }]
                },

                options: {
                    scales: {
                        xAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }

        function GraficoChilexcatic(Nombrec, TempMin, TempMax, TempOpt, humRel, humMin, humMax) {


            var ctx = document.getElementById('GraficoChileXcatic').getContext('2d');

            var chart = new Chart(ctx, {

                type: 'bar',
                data: {
                    labels: Nombrec,


                    datasets: [{
                        label: 'TempMin',
                        backgroundColor: '#FF0068',
                        borderColor: '#FF0068',
                        data: TempMin
                    },
                    {
                        label: 'TempMax',
                        backgroundColor: '#FF003E',
                        borderColor: '#FF003E',
                        data: TempMax

                    },
                    {
                        label: 'TempOpt',
                        backgroundColor: '#00FF68',
                        borderColor: '#00FF68',
                        data: TempOpt


                    },
                    {
                        label: 'HumRel',
                        backgroundColor: '#00FFFB',
                        borderColor: '#00FFFB',
                        data: humRel

                    },
                    {

                        label: 'HumMin',
                        backgroundColor: '#041048',
                        borderColor: '#041048',
                        data: humMin

                    },
                    {

                        label: 'HumMax',
                        backgroundColor: '#260448',
                        borderColor: '#260448',
                        data: humMax
                    }]
                },

                options: {
                    scales: {
                        xAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }

        function GraficoChilehabanero(Nombrec, TempMin, TempMax, TempOpt, humRel, humMin, humMax) {


            var ctx = document.getElementById('GraficoChileHabanero').getContext('2d');

            var chart = new Chart(ctx, {

                type: 'bar',
                data: {
                    labels: Nombrec,


                    datasets: [{
                        label: 'TempMin',
                        backgroundColor: '#FF0068',
                        borderColor: '#FF0068',
                        data: TempMin
                    },
                    {
                        label: 'TempMax',
                        backgroundColor: '#FF003E',
                        borderColor: '#FF003E',
                        data: TempMax

                    },
                    {
                        label: 'TempOpt',
                        backgroundColor: '#00FF68',
                        borderColor: '#00FF68',
                        data: TempOpt


                    },
                    {
                        label: 'HumRel',
                        backgroundColor: '#00FFFB',
                        borderColor: '#00FFFB',
                        data: humRel

                    },
                    {

                        label: 'HumMin',
                        backgroundColor: '#041048',
                        borderColor: '#041048',
                        data: humMin

                    },
                    {

                        label: 'HumMax',
                        backgroundColor: '#260448',
                        borderColor: '#260448',
                        data: humMax
                    }]
                },

                options: {
                    scales: {
                        xAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }


</script>
