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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
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
            <a class="navbar-brand" href="bienvenida.php">AgroTec</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>

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
                        <h1 class="mt-4">Tablas</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"><a href="bienvenida.php">Inicio</a> <a>/</a> <a href="Graficas.php">Graficas</a> <a>/</a> <a href="Tablas.php">Tablas</a></li>
                        </ol>

                        <!--
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Total de Cultivos</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Total de Terrenos</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Terrenos Óptimos</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Terrenos con deficiencia</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        -->
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
