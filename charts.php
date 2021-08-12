<?php

    session_start();
    $usuario = $_SESSION["usuario"];
    $id = $_SESSION["id"];
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

?>




<!DOCTYPE html>
<html lang="en">
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
        <link rel="shortcut icon" href="images/AgroTec.png">

    
  </head>
  <body class="sb-nav-fixed">
    <title>GRAFICO CON CHARTJS</title>
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="bienvenida.php">AgroTec</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>

            <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $usuario ?><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Configuración</a>
                        <div class="dropdown-divider"></div>
                        
                        <a class="dropdown-item" href="cerrar-sesion.php">Salir</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="bienvenida.php"
                                ><div class="sb-nav-link-icon"></div>
                                Inicio</a>

                                <?php if($id == 1){ ?>

                            <div class="sb-sidenav-menu-heading">Administrar</div>
                           


                            <!-- DATOS DE CULTIVO -->
                            <a class="nav-link" href="Cultivo.php"
                                ><div class="sb-nav-link-icon"></div>
                                Cultivos</a>


                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages" href="Cultivo.php">
                                <div class="sb-nav-link-icon"></div>
                                Terrenos
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div></a>
                                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                            <nav class="sb-sidenav-menu-nested nav">
                                                <a class="nav-link" href="Terreno.php">Calkiní</a>  
                                            </nav>
                                </div>

                            <?php } ?>
                            <div class="sb-sidenav-menu-heading">VISTAS</div>
                            <a class="nav-link" href="charts.php"
                                ><div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Graficas</a
                            ><a class="nav-link" href="tables.html"
                                ><div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tablas</a
                            >
                            
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Bienvenido a:</div>
                        AgroTec
                    </div>
                </nav>
            </div>

    <div id="layoutSidenav_content">
    <main>
        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header"><i class= "fas fa-chart-bar mr-1"></i>Grafico Barras-Sandía</div>
                                    <div class="card-body">
                                        <canvas id="GraficoBar" width="100%" height="40"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header"><i class="fas fa-chart-pie mr-1"></i>Grafico Circular</div>
                                    <div class="card-body">
                                        <canvas id="GraficoCircular" width="100%" height="40"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header"><i class="fas fa-chart-pie mr-1"></i>Grafico Pie</div>
                                    <div class="card-body">
                                        <canvas id="GraficoPie" width="100%" height="40"></canvas>
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
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
  </body>
</html>
<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js"></script>
    
    <script>
        CargarDatosGraficoBar();
        CargarDatosGraficoDoughnut();
        CargarDatosGraficoPie();  
        function CargarDatosGraficoBar(){
            $.ajax({
                url:'controlador_grafico.php',
                type:'POST'
            }).done(function(resp){
                if(resp.length>0){
                    var titulo   = [];
                    var cantidad = [];
                    var colores    = [];
                    var data = JSON.parse(resp);
                    for(var i=0; i<data.length; i++){
                        titulo.push(data[i][0]);
                        cantidad.push(data[i][1]);
                        colores.push(colorRGB());
                    }
                     Creargrafico(titulo, cantidad, colores, 'bar', 'GRAFICO EN BARRAS DE CULTIVOS', 'GraficoBar');
                     
                }  
            })
        }
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
                    Creargrafico(titulo, cantidad, colores, 'pie', 'GRAFICO PIE DE PRODUCTOS', 'GraficoPie');
                     
                }  
            })
        }
        
        function Creargrafico(titulo, cantidad, colores, tipo, encabezado, id){

                var ctx = document.getElementById(id);
                var myChart = new Chart(ctx, {
                    type: tipo,
                    data: {
                        labels: titulo,
                        datasets: [{
                            label: encabezado,
                            data: cantidad,
                            backgroundColor: colores,
                            borderColor: colores,
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
        }


        function generarNumero(numero){
            return(Math.random()*numero).toFixed(0);
        }
        function colorRGB(){
            var color = "("+generarNumero(255)+"," +generarNumero(255) + "," + generarNumero(255) +")";
            return "rgb" + color;
        }
    </script>