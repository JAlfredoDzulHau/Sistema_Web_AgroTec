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

 <?php
include_once 'bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta1 = "SELECT cultivo_id, Nombrec, TempMin, TempMax, TempOpt, humRel, humMin, humMax FROM cultivos";
$resultado1 = $conexion->prepare($consulta1);
$resultado1->execute();
$terreno_opt=$resultado1->fetchAll(PDO::FETCH_ASSOC);

$consulta_01 = "SELECT id, Nombrec, TempMin, TempMax, TempOpt, humRel, humMin, humMax FROM becal";
$resultado_01 = $conexion->prepare($consulta_01);
$resultado_01->execute();
$cultivo_becal=$resultado_01->fetchAll(PDO::FETCH_ASSOC);

$consulta_02 = "SELECT id, Nombrec, TempMin, TempMax, TempOpt, humRel, humMin, humMax FROM dzitbalche";
$resultado_02 = $conexion->prepare($consulta_02);
$resultado_02->execute();
$cultivo_dzitbalche=$resultado_02->fetchAll(PDO::FETCH_ASSOC);

$consulta_03 = "SELECT id, Nombrec, TempMin, TempMax, TempOpt, humRel, humMin, humMax FROM calkini";
$resultado_03 = $conexion->prepare($consulta_03);
$resultado_03->execute();
$cultivo_calkini=$resultado_03->fetchAll(PDO::FETCH_ASSOC);

$consulta_04 = "SELECT id, Nombrec, TempMin, TempMax, TempOpt, humRel, humMin, humMax FROM helcelchakan";
$resultado_04 = $conexion->prepare($consulta_04);
$resultado_04->execute();
$cultivo_helcelchakan=$resultado_04->fetchAll(PDO::FETCH_ASSOC);

$consulta_05 = "SELECT id, Nombrec, TempMin, TempMax, TempOpt, humRel, humMin, humMax FROM chunhuas";
$resultado_05 = $conexion->prepare($consulta_05);
$resultado_05->execute();
$cultivo_chunhuas=$resultado_05->fetchAll(PDO::FETCH_ASSOC);

$consulta_06 = "SELECT id, Nombrec, TempMin, TempMax, TempOpt, humRel, humMin, humMax FROM xcolok";
$resultado_06 = $conexion->prepare($consulta_06);
$resultado_06->execute();
$cultivo_xcolok=$resultado_06->fetchAll(PDO::FETCH_ASSOC);

$consulta_07 = "SELECT id, Nombrec, TempMin, TempMax, TempOpt, humRel, humMin, humMax FROM tepakan";
$resultado_07 = $conexion->prepare($consulta_07);
$resultado_07->execute();
$cultivo_tepakan=$resultado_07->fetchAll(PDO::FETCH_ASSOC);

$consulta_08 = "SELECT id, Nombrec, TempMin, TempMax, TempOpt, humRel, humMin, humMax FROM maxcanu";
$resultado_08 = $conexion->prepare($consulta_08);
$resultado_08->execute();
$cultivo_maxcanu=$resultado_08->fetchAll(PDO::FETCH_ASSOC);

$consulta_09 = "SELECT id, Nombrec, TempMin, TempMax, TempOpt, humRel, humMin, humMax FROM halacho";
$resultado_09 = $conexion->prepare($consulta_09);
$resultado_09->execute();
$cultivo_halacho=$resultado_09->fetchAll(PDO::FETCH_ASSOC);


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
                        <ol class="breadcrumb mb-4 justify-content-center">
                            <li class="breadcrumb-item active">REPORTES DE CULTIVOS DE LOS TERRENOS</li>
                        </ol>
                      <!-- TABLAS Y GRAFICAS DE CADA CULTIVO -->
                      <div class="row">
                      <div class="col-xl-6">
                        <div class="card mb-4">                                    
                          <div class="table-responsive">        
                            <table id="tablaPersonas" class="table table-striped table-bordered table-condensed" style="width:100%">
                            <thead class="text-center">
                                <tr bgcolor="#00BFA5">
                                    <th colspan="2">Cultivos del Terreno de: <strong>BECAL</strong></th>
                                </tr>
                                <tr bgcolor="#FFE0B2">
                                    <th>Nombre de Cultivo</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php                            
                                $resultValue = array();
                                foreach ( $cultivo_becal as $cultivoValue ) {                                                        
                                ?>
                                <tr>
                                    <td><strong><?php echo $cultivoValue['Nombrec']; ?> </strong></td>
                                    <td><?php foreach ( $terreno_opt as $terrenoValue ) {
                                           //Evaluamos cada dato
                                      if ( $cultivoValue['Nombrec'] == $terrenoValue['Nombrec']) {
                                        if ($cultivoValue['TempMin'] == $terrenoValue['TempMin']) {
                                          if ($cultivoValue['TempMax'] == $terrenoValue['TempMax']) {
                                            if ($cultivoValue['TempOpt'] == $terrenoValue['TempOpt']) {
                                              if ($cultivoValue['humRel'] == $terrenoValue['humRel']) {
                                                if ($cultivoValue['humMin'] == $terrenoValue['humMin']) {
                                                  if ($cultivoValue['humMax'] == $terrenoValue['humMax']) {
                                                     $resultValue[] = $cultivoValue;
                                                     //Asignamos el valor de los resultados obtenidos
                                                     echo '<button class="btn btn-success" type="button"><strong>ÓPTIMO</strong></button>';
                                                  } else {
                                                  echo '<button class="btn btn-danger" type="button"><strong>DEFICIENTE</strong></button>';
                                                    }
                                                  } else {
                                                  echo '<button class="btn btn-danger" type="button"><strong>DEFICIENTE</strong></button>';
                                                  }
                                                } else {
                                                echo '<button class="btn btn-danger" type="button"><strong>DEFICIENTE</strong></button>';
                                                }
                                              } else {
                                              echo '<button class="btn btn-danger" type="button"><strong>DEFICIENTE</strong></button>';
                                              }
                                            } else {
                                           echo '<button class="btn btn-danger" type="button"><strong>DEFICIENTE</strong></button>';
                                          }
                                        } else {
                                         echo '<button class="btn btn-danger" type="button"><strong>DEFICIENTE</strong></button>';
                                        }
                                      }
                                    } ?>
                                  </td>
                                </tr>
                                <?php
                                    }
                                ?>                                
                            </tbody>        
                           </table>                    
                          </div>
                          <a href="T_Becal.php" align="center"><strong>> > > Ver Detalles < < <</strong></a><br>
                        </div>
                      </div>

                      <div class="col-xl-6">
                          <div class="card mb-4">
                              <div class="card-header"><i class="fas fa-chart-pie mr-1"></i>Datos Óptimos para: <strong>TOMATE</strong> <i class="fas fa-apple-alt"></i></div>
                              <div class="card-body">
                                  <canvas id="Graficotomate" width="100%" height="40"></canvas>
                              </div>
                              <a href="Cultivo.php" align="center"><strong>> > > Ver Detalles < < <</strong></a><br>
                          </div>
                      </div>

                      <div class="col-xl-6">
                        <div class="card mb-4">                                    
                          <div class="table-responsive">        
                            <table id="tablaPersonas" class="table table-striped table-bordered table-condensed" style="width:100%">
                            <thead class="text-center">
                                <tr bgcolor="#00BFA5">
                                    <th colspan="2">Cultivos del Terreno de: <strong>DZITBALCHE</strong></th>
                                </tr>
                                <tr bgcolor="#FFE0B2">
                                    <th>Nombre de Cultivo</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php                            
                                $resultValue = array();
                                foreach ( $cultivo_dzitbalche as $cultivoValue ) {                                                        
                                ?>
                                <tr>
                                    <td><strong><?php echo $cultivoValue['Nombrec']; ?> </strong></td>
                                    <td><?php foreach ( $terreno_opt as $terrenoValue ) {
                                           //Evaluamos cada dato
                                      if ( $cultivoValue['Nombrec'] == $terrenoValue['Nombrec']) {
                                        if ($cultivoValue['TempMin'] == $terrenoValue['TempMin']) {
                                          if ($cultivoValue['TempMax'] == $terrenoValue['TempMax']) {
                                            if ($cultivoValue['TempOpt'] == $terrenoValue['TempOpt']) {
                                              if ($cultivoValue['humRel'] == $terrenoValue['humRel']) {
                                                if ($cultivoValue['humMin'] == $terrenoValue['humMin']) {
                                                  if ($cultivoValue['humMax'] == $terrenoValue['humMax']) {
                                                     $resultValue[] = $cultivoValue;
                                                     //Asignamos el valor de los resultados obtenidos
                                                     echo '<button class="btn btn-success" type="button"><strong>ÓPTIMO</strong></button>';
                                                  } else {
                                                  echo '<button class="btn btn-danger" type="button"><strong>DEFICIENTE</strong></button>';
                                                    }
                                                  } else {
                                                  echo '<button class="btn btn-danger" type="button"><strong>DEFICIENTE</strong></button>';
                                                  }
                                                } else {
                                                echo '<button class="btn btn-danger" type="button"><strong>DEFICIENTE</strong></button>';
                                                }
                                              } else {
                                              echo '<button class="btn btn-danger" type="button"><strong>DEFICIENTE</strong></button>';
                                              }
                                            } else {
                                           echo '<button class="btn btn-danger" type="button"><strong>DEFICIENTE</strong></button>';
                                          }
                                        } else {
                                         echo '<button class="btn btn-danger" type="button"><strong>DEFICIENTE</strong></button>';
                                        }
                                      }
                                    } ?>
                                  </td>
                                </tr>
                                <?php
                                    }
                                ?>                                
                            </tbody>        
                           </table>                    
                          </div>
                          <a href="T_Dzitbalché.php" align="center"><strong>> > > Ver Detalles < < <</strong></a><br>
                        </div>
                      </div>

                      <div class="col-xl-6">
                          <div class="card mb-4">
                              <div class="card-header"><i class="fas fa-chart-pie mr-1"></i>Datos Óptimos para: <strong>MAIZ</strong> <i class="fas fa-corn"></i></div>
                              <div class="card-body">
                                  <canvas id="GraficoMaiz" width="100%" height="40"></canvas>
                              </div>
                              <a href="Cultivo.php" align="center"><strong>> > > Ver Detalles < < <</strong></a><br>
                          </div>
                      </div>

                      <div class="col-xl-6">
                        <div class="card mb-4">                                    
                          <div class="table-responsive">        
                            <table id="tablaPersonas" class="table table-striped table-bordered table-condensed" style="width:100%">
                            <thead class="text-center">
                                <tr bgcolor="#00BFA5">
                                    <th colspan="2">Cultivos del Terreno de: <strong>CALKINI</strong></th>
                                </tr>
                                <tr bgcolor="#FFE0B2">
                                    <th>Nombre de Cultivo</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php                            
                                $resultValue = array();
                                foreach ( $cultivo_calkini as $cultivoValue ) {                                                        
                                ?>
                                <tr>
                                    <td><strong><?php echo $cultivoValue['Nombrec']; ?> </strong></td>
                                    <td><?php foreach ( $terreno_opt as $terrenoValue ) {
                                           //Evaluamos cada dato
                                      if ( $cultivoValue['Nombrec'] == $terrenoValue['Nombrec']) {
                                        if ($cultivoValue['TempMin'] == $terrenoValue['TempMin']) {
                                          if ($cultivoValue['TempMax'] == $terrenoValue['TempMax']) {
                                            if ($cultivoValue['TempOpt'] == $terrenoValue['TempOpt']) {
                                              if ($cultivoValue['humRel'] == $terrenoValue['humRel']) {
                                                if ($cultivoValue['humMin'] == $terrenoValue['humMin']) {
                                                  if ($cultivoValue['humMax'] == $terrenoValue['humMax']) {
                                                     $resultValue[] = $cultivoValue;
                                                     //Asignamos el valor de los resultados obtenidos
                                                     echo '<button class="btn btn-success" type="button"><strong>ÓPTIMO</strong></button>';
                                                  } else {
                                                  echo '<button class="btn btn-danger" type="button"><strong>DEFICIENTE</strong></button>';
                                                    }
                                                  } else {
                                                  echo '<button class="btn btn-danger" type="button"><strong>DEFICIENTE</strong></button>';
                                                  }
                                                } else {
                                                echo '<button class="btn btn-danger" type="button"><strong>DEFICIENTE</strong></button>';
                                                }
                                              } else {
                                              echo '<button class="btn btn-danger" type="button"><strong>DEFICIENTE</strong></button>';
                                              }
                                            } else {
                                           echo '<button class="btn btn-danger" type="button"><strong>DEFICIENTE</strong></button>';
                                          }
                                        } else {
                                         echo '<button class="btn btn-danger" type="button"><strong>DEFICIENTE</strong></button>';
                                        }
                                      }
                                    } ?>
                                  </td>
                                </tr>
                                <?php
                                    }
                                ?>                                
                            </tbody>        
                           </table>                    
                          </div>
                          <a href="T_Calkiní.php" align="center"><strong>> > > Ver Detalles < < <</strong></a><br>
                        </div>
                      </div>

                      <div class="col-xl-6">
                          <div class="card mb-4">
                              <div class="card-header"><i class="fas fa-chart-pie mr-1"></i>Datos Óptimos para: <strong>SANDIA</strong> <i class="fas fa-apple-crate"></i></div>
                              <div class="card-body">
                                  <canvas id="Graficosandia" width="100%" height="40"></canvas>
                              </div>
                              <a href="Cultivo.php" align="center"><strong>> > > Ver Detalles < < <</strong></a><br>
                          </div>
                      </div>

                      <div class="col-xl-6">
                        <div class="card mb-4">                                    
                          <div class="table-responsive">        
                            <table id="tablaPersonas" class="table table-striped table-bordered table-condensed" style="width:100%">
                            <thead class="text-center">
                                <tr bgcolor="#00BFA5">
                                    <th colspan="2">Cultivos del Terreno de: <strong>HECELCHAKAN</strong></th>
                                </tr>
                                <tr bgcolor="#FFE0B2">
                                    <th>Nombre de Cultivo</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php                            
                                $resultValue = array();
                                foreach ( $cultivo_helcelchakan as $cultivoValue ) {                                                        
                                ?>
                                <tr>
                                    <td><strong><?php echo $cultivoValue['Nombrec']; ?> </strong></td>
                                    <td><?php foreach ( $terreno_opt as $terrenoValue ) {
                                           //Evaluamos cada dato
                                      if ( $cultivoValue['Nombrec'] == $terrenoValue['Nombrec']) {
                                        if ($cultivoValue['TempMin'] == $terrenoValue['TempMin']) {
                                          if ($cultivoValue['TempMax'] == $terrenoValue['TempMax']) {
                                            if ($cultivoValue['TempOpt'] == $terrenoValue['TempOpt']) {
                                              if ($cultivoValue['humRel'] == $terrenoValue['humRel']) {
                                                if ($cultivoValue['humMin'] == $terrenoValue['humMin']) {
                                                  if ($cultivoValue['humMax'] == $terrenoValue['humMax']) {
                                                     $resultValue[] = $cultivoValue;
                                                     //Asignamos el valor de los resultados obtenidos
                                                     echo '<button class="btn btn-success" type="button"><strong>ÓPTIMO</strong></button>';
                                                  } else {
                                                  echo '<button class="btn btn-danger" type="button"><strong>DEFICIENTE</strong></button>';
                                                    }
                                                  } else {
                                                  echo '<button class="btn btn-danger" type="button"><strong>DEFICIENTE</strong></button>';
                                                  }
                                                } else {
                                                echo '<button class="btn btn-danger" type="button"><strong>DEFICIENTE</strong></button>';
                                                }
                                              } else {
                                              echo '<button class="btn btn-danger" type="button"><strong>DEFICIENTE</strong></button>';
                                              }
                                            } else {
                                           echo '<button class="btn btn-danger" type="button"><strong>DEFICIENTE</strong></button>';
                                          }
                                        } else {
                                         echo '<button class="btn btn-danger" type="button"><strong>DEFICIENTE</strong></button>';
                                        }
                                      }
                                    } ?>
                                  </td>
                                </tr>
                                <?php
                                    }
                                ?>                                
                            </tbody>        
                           </table>                    
                          </div>
                          <a href="T_Helcelchakán.php" align="center"><strong>> > > Ver Detalles < < <</strong></a><br>
                        </div>
                      </div>

                      <div class="col-xl-6">
                          <div class="card mb-4">
                              <div class="card-header"><i class="fas fa-chart-pie mr-1"></i>Datos Óptimos para: <strong>CALABAZA</strong> <i class="fas fa-pumpkin"></i></div>
                              <div class="card-body">
                                  <canvas id="GraficoCalabaza" width="100%" height="40"></canvas>
                              </div>
                              <a href="Cultivo.php" align="center"><strong>> > > Ver Detalles < < <</strong></a><br>
                          </div>
                      </div>

                      <div class="col-xl-6">
                        <div class="card mb-4">                                    
                          <div class="table-responsive">        
                            <table id="tablaPersonas" class="table table-striped table-bordered table-condensed" style="width:100%">
                            <thead class="text-center">
                                <tr bgcolor="#00BFA5">
                                    <th colspan="2">Cultivos del Terreno de: <strong>CHUNHUAS</strong></th>
                                </tr>
                                <tr bgcolor="#FFE0B2">
                                    <th>Nombre de Cultivo</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php                            
                                $resultValue = array();
                                foreach ( $cultivo_chunhuas as $cultivoValue ) {                                                        
                                ?>
                                <tr>
                                    <td><strong><?php echo $cultivoValue['Nombrec']; ?> </strong></td>
                                    <td><?php foreach ( $terreno_opt as $terrenoValue ) {
                                           //Evaluamos cada dato
                                      if ( $cultivoValue['Nombrec'] == $terrenoValue['Nombrec']) {
                                        if ($cultivoValue['TempMin'] == $terrenoValue['TempMin']) {
                                          if ($cultivoValue['TempMax'] == $terrenoValue['TempMax']) {
                                            if ($cultivoValue['TempOpt'] == $terrenoValue['TempOpt']) {
                                              if ($cultivoValue['humRel'] == $terrenoValue['humRel']) {
                                                if ($cultivoValue['humMin'] == $terrenoValue['humMin']) {
                                                  if ($cultivoValue['humMax'] == $terrenoValue['humMax']) {
                                                     $resultValue[] = $cultivoValue;
                                                     //Asignamos el valor de los resultados obtenidos
                                                     echo '<button class="btn btn-success" type="button"><strong>ÓPTIMO</strong></button>';
                                                  } else {
                                                  echo '<button class="btn btn-danger" type="button"><strong>DEFICIENTE</strong></button>';
                                                    }
                                                  } else {
                                                  echo '<button class="btn btn-danger" type="button"><strong>DEFICIENTE</strong></button>';
                                                  }
                                                } else {
                                                echo '<button class="btn btn-danger" type="button"><strong>DEFICIENTE</strong></button>';
                                                }
                                              } else {
                                              echo '<button class="btn btn-danger" type="button"><strong>DEFICIENTE</strong></button>';
                                              }
                                            } else {
                                           echo '<button class="btn btn-danger" type="button"><strong>DEFICIENTE</strong></button>';
                                          }
                                        } else {
                                         echo '<button class="btn btn-danger" type="button"><strong>DEFICIENTE</strong></button>';
                                        }
                                      }
                                    } ?>
                                  </td>
                                </tr>
                                <?php
                                    }
                                ?>                                
                            </tbody>        
                           </table>                    
                          </div>
                          <a href="T_ChunHuas.php" align="center"><strong>> > > Ver Detalles < < <</strong></a><br>
                        </div>
                      </div>

                      <div class="col-xl-6">
                          <div class="card mb-4">
                              <div class="card-header"><i class="fas fa-chart-pie mr-1"></i>Datos Óptimos para: <strong>CHIHUA</strong> <i class="fas fa-pumpkin"></i></div>
                              <div class="card-body">
                                  <canvas id="GraficoChihua" width="100%" height="40"></canvas>
                              </div>
                              <a href="Cultivo.php" align="center"><strong>> > > Ver Detalles < < <</strong></a><br>
                          </div>
                      </div>

                      <div class="col-xl-6">
                        <div class="card mb-4">                                    
                          <div class="table-responsive">        
                            <table id="tablaPersonas" class="table table-striped table-bordered table-condensed" style="width:100%">
                            <thead class="text-center">
                                <tr bgcolor="#00BFA5">
                                    <th colspan="2">Cultivos del Terreno de: <strong>XCOLOK</strong></th>
                                </tr>
                                <tr bgcolor="#FFE0B2">
                                    <th>Nombre de Cultivo</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php                            
                                $resultValue = array();
                                foreach ( $cultivo_xcolok as $cultivoValue ) {                                                        
                                ?>
                                <tr>
                                    <td><strong><?php echo $cultivoValue['Nombrec']; ?> </strong></td>
                                    <td><?php foreach ( $terreno_opt as $terrenoValue ) {
                                           //Evaluamos cada dato
                                      if ( $cultivoValue['Nombrec'] == $terrenoValue['Nombrec']) {
                                        if ($cultivoValue['TempMin'] == $terrenoValue['TempMin']) {
                                          if ($cultivoValue['TempMax'] == $terrenoValue['TempMax']) {
                                            if ($cultivoValue['TempOpt'] == $terrenoValue['TempOpt']) {
                                              if ($cultivoValue['humRel'] == $terrenoValue['humRel']) {
                                                if ($cultivoValue['humMin'] == $terrenoValue['humMin']) {
                                                  if ($cultivoValue['humMax'] == $terrenoValue['humMax']) {
                                                     $resultValue[] = $cultivoValue;
                                                     //Asignamos el valor de los resultados obtenidos
                                                     echo '<button class="btn btn-success" type="button"><strong>ÓPTIMO</strong></button>';
                                                  } else {
                                                  echo '<button class="btn btn-danger" type="button"><strong>DEFICIENTE</strong></button>';
                                                    }
                                                  } else {
                                                  echo '<button class="btn btn-danger" type="button"><strong>DEFICIENTE</strong></button>';
                                                  }
                                                } else {
                                                echo '<button class="btn btn-danger" type="button"><strong>DEFICIENTE</strong></button>';
                                                }
                                              } else {
                                              echo '<button class="btn btn-danger" type="button"><strong>DEFICIENTE</strong></button>';
                                              }
                                            } else {
                                           echo '<button class="btn btn-danger" type="button"><strong>DEFICIENTE</strong></button>';
                                          }
                                        } else {
                                         echo '<button class="btn btn-danger" type="button"><strong>DEFICIENTE</strong></button>';
                                        }
                                      }
                                    } ?>
                                  </td>
                                </tr>
                                <?php
                                    }
                                ?>                                
                            </tbody>        
                           </table>                    
                          </div>
                          <a href="T_Xcolok.php" align="center"><strong>> > > Ver Detalles < < <</strong></a><br>
                        </div>
                      </div>

                      <div class="col-xl-6">
                          <div class="card mb-4">
                              <div class="card-header"><i class="fas fa-chart-pie mr-1"></i>Datos Óptimos para: <strong>CHILE DULCE</strong> <i class="fas fa-pepper-hot"></i></div>
                              <div class="card-body">
                                  <canvas id="GraficoChileDulce" width="100%" height="40"></canvas>
                              </div>
                              <a href="Cultivo.php" align="center"><strong>> > > Ver Detalles < < <</strong></a><br>
                          </div>
                      </div>

                      <div class="col-xl-6">
                        <div class="card mb-4">                                    
                          <div class="table-responsive">        
                            <table id="tablaPersonas" class="table table-striped table-bordered table-condensed" style="width:100%">
                            <thead class="text-center">
                                <tr bgcolor="#00BFA5">
                                    <th colspan="2">Cultivos del Terreno de: <strong>TEPAKAN</strong></th>
                                </tr>
                                <tr bgcolor="#FFE0B2">
                                    <th>Nombre de Cultivo</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php                            
                                $resultValue = array();
                                foreach ( $cultivo_tepakan as $cultivoValue ) {                                                        
                                ?>
                                <tr>
                                    <td><strong><?php echo $cultivoValue['Nombrec']; ?> </strong></td>
                                    <td><?php foreach ( $terreno_opt as $terrenoValue ) {
                                           //Evaluamos cada dato
                                      if ( $cultivoValue['Nombrec'] == $terrenoValue['Nombrec']) {
                                        if ($cultivoValue['TempMin'] == $terrenoValue['TempMin']) {
                                          if ($cultivoValue['TempMax'] == $terrenoValue['TempMax']) {
                                            if ($cultivoValue['TempOpt'] == $terrenoValue['TempOpt']) {
                                              if ($cultivoValue['humRel'] == $terrenoValue['humRel']) {
                                                if ($cultivoValue['humMin'] == $terrenoValue['humMin']) {
                                                  if ($cultivoValue['humMax'] == $terrenoValue['humMax']) {
                                                     $resultValue[] = $cultivoValue;
                                                     //Asignamos el valor de los resultados obtenidos
                                                     echo '<button class="btn btn-success" type="button"><strong>ÓPTIMO</strong></button>';
                                                  } else {
                                                  echo '<button class="btn btn-danger" type="button"><strong>DEFICIENTE</strong></button>';
                                                    }
                                                  } else {
                                                  echo '<button class="btn btn-danger" type="button"><strong>DEFICIENTE</strong></button>';
                                                  }
                                                } else {
                                                echo '<button class="btn btn-danger" type="button"><strong>DEFICIENTE</strong></button>';
                                                }
                                              } else {
                                              echo '<button class="btn btn-danger" type="button"><strong>DEFICIENTE</strong></button>';
                                              }
                                            } else {
                                           echo '<button class="btn btn-danger" type="button"><strong>DEFICIENTE</strong></button>';
                                          }
                                        } else {
                                         echo '<button class="btn btn-danger" type="button"><strong>DEFICIENTE</strong></button>';
                                        }
                                      }
                                    } ?>
                                  </td>
                                </tr>
                                <?php
                                    }
                                ?>                                
                            </tbody>        
                           </table>                    
                          </div>
                          <a href="T_Tepakan.php" align="center"><strong>> > > Ver Detalles < < <</strong></a><br>
                        </div>
                      </div>

                      <div class="col-xl-6">
                          <div class="card mb-4">
                              <div class="card-header"><i class="fas fa-chart-pie mr-1"></i>Datos Óptimos para: <strong>CHILE XCATIC</strong> <i class="fas fa-pepper-hot"></i></div>
                              <div class="card-body">
                                  <canvas id="GraficoChileXcatic" width="100%" height="40"></canvas>
                              </div>
                              <a href="Cultivo.php" align="center"><strong>> > > Ver Detalles < < <</strong></a><br>
                          </div>
                      </div>

                      <div class="col-xl-6">
                        <div class="card mb-4">                                    
                          <div class="table-responsive">        
                            <table id="tablaPersonas" class="table table-striped table-bordered table-condensed" style="width:100%">
                            <thead class="text-center">
                                <tr bgcolor="#00BFA5">
                                    <th colspan="2">Cultivos del Terreno de: <strong>MAXCANU</strong></th>
                                </tr>
                                <tr bgcolor="#FFE0B2">
                                    <th>Nombre de Cultivo</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php                            
                                $resultValue = array();
                                foreach ( $cultivo_maxcanu as $cultivoValue ) {                                                        
                                ?>
                                <tr>
                                    <td><strong><?php echo $cultivoValue['Nombrec']; ?> </strong></td>
                                    <td><?php foreach ( $terreno_opt as $terrenoValue ) {
                                           //Evaluamos cada dato
                                      if ( $cultivoValue['Nombrec'] == $terrenoValue['Nombrec']) {
                                        if ($cultivoValue['TempMin'] == $terrenoValue['TempMin']) {
                                          if ($cultivoValue['TempMax'] == $terrenoValue['TempMax']) {
                                            if ($cultivoValue['TempOpt'] == $terrenoValue['TempOpt']) {
                                              if ($cultivoValue['humRel'] == $terrenoValue['humRel']) {
                                                if ($cultivoValue['humMin'] == $terrenoValue['humMin']) {
                                                  if ($cultivoValue['humMax'] == $terrenoValue['humMax']) {
                                                     $resultValue[] = $cultivoValue;
                                                     //Asignamos el valor de los resultados obtenidos
                                                     echo '<button class="btn btn-success" type="button"><strong>ÓPTIMO</strong></button>';
                                                  } else {
                                                  echo '<button class="btn btn-danger" type="button"><strong>DEFICIENTE</strong></button>';
                                                    }
                                                  } else {
                                                  echo '<button class="btn btn-danger" type="button"><strong>DEFICIENTE</strong></button>';
                                                  }
                                                } else {
                                                echo '<button class="btn btn-danger" type="button"><strong>DEFICIENTE</strong></button>';
                                                }
                                              } else {
                                              echo '<button class="btn btn-danger" type="button"><strong>DEFICIENTE</strong></button>';
                                              }
                                            } else {
                                           echo '<button class="btn btn-danger" type="button"><strong>DEFICIENTE</strong></button>';
                                          }
                                        } else {
                                         echo '<button class="btn btn-danger" type="button"><strong>DEFICIENTE</strong></button>';
                                        }
                                      }
                                    } ?>
                                  </td>
                                </tr>
                                <?php
                                    }
                                ?>                                
                            </tbody>        
                           </table>                    
                          </div>
                          <a href="T_Maxcanu.php" align="center"><strong>> > > Ver Detalles < < <</strong></a><br>
                        </div>
                      </div>

                      <div class="col-xl-6">
                          <div class="card mb-4">
                              <div class="card-header"><i class="fas fa-chart-pie mr-1"></i>Datos Óptimos para: <strong>CHILE HABANERO</strong> <i class="fas fa-pepper-hot"></i></div>
                              <div class="card-body">
                                  <canvas id="GraficoChileHabanero" width="100%" height="40"></canvas>
                              </div>
                              <a href="Cultivo.php" align="center"><strong>> > > Ver Detalles < < <</strong></a><br>
                          </div>
                      </div>

                      <div class="col-xl-6">
                        <div class="card mb-4">                                    
                          <div class="table-responsive">        
                            <table id="tablaPersonas" class="table table-striped table-bordered table-condensed" style="width:100%">
                            <thead class="text-center">
                                <tr bgcolor="#00BFA5">
                                    <th colspan="2">Cultivos del Terreno de: <strong>HALACHO</strong></th>
                                </tr>
                                <tr bgcolor="#FFE0B2">
                                    <th>Nombre de Cultivo</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php                            
                                $resultValue = array();
                                foreach ( $cultivo_halacho as $cultivoValue ) {                                                        
                                ?>
                                <tr>
                                    <td><strong><?php echo $cultivoValue['Nombrec']; ?> </strong></td>
                                    <td><?php foreach ( $terreno_opt as $terrenoValue ) {
                                           //Evaluamos cada dato
                                      if ( $cultivoValue['Nombrec'] == $terrenoValue['Nombrec']) {
                                        if ($cultivoValue['TempMin'] == $terrenoValue['TempMin']) {
                                          if ($cultivoValue['TempMax'] == $terrenoValue['TempMax']) {
                                            if ($cultivoValue['TempOpt'] == $terrenoValue['TempOpt']) {
                                              if ($cultivoValue['humRel'] == $terrenoValue['humRel']) {
                                                if ($cultivoValue['humMin'] == $terrenoValue['humMin']) {
                                                  if ($cultivoValue['humMax'] == $terrenoValue['humMax']) {
                                                     $resultValue[] = $cultivoValue;
                                                     //Asignamos el valor de los resultados obtenidos
                                                     echo '<button class="btn btn-success" type="button"><strong>ÓPTIMO</strong></button>';
                                                  } else {
                                                  echo '<button class="btn btn-danger" type="button"><strong>DEFICIENTE</strong></button>';
                                                    }
                                                  } else {
                                                  echo '<button class="btn btn-danger" type="button"><strong>DEFICIENTE</strong></button>';
                                                  }
                                                } else {
                                                echo '<button class="btn btn-danger" type="button"><strong>DEFICIENTE</strong></button>';
                                                }
                                              } else {
                                              echo '<button class="btn btn-danger" type="button"><strong>DEFICIENTE</strong></button>';
                                              }
                                            } else {
                                           echo '<button class="btn btn-danger" type="button"><strong>DEFICIENTE</strong></button>';
                                          }
                                        } else {
                                         echo '<button class="btn btn-danger" type="button"><strong>DEFICIENTE</strong></button>';
                                        }
                                      }
                                    } ?>
                                  </td>
                                </tr>
                                <?php
                                    }
                                ?>                                
                            </tbody>        
                           </table>                    
                          </div>
                          <a href="T_Halacho.php" align="center"><strong>> > > Ver Detalles < < <</strong></a><br>
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
