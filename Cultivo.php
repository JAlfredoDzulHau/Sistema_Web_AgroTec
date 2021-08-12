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
  include_once 'conexion.php';
  $objeto = new Conexion();
  $conexion =$objeto->Conectar();
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


        <!-- ARCHIVOS PARA BD -->        
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
          <link href="https://fonts.googleapis.com/css?family=Material+Icons" rel="stylesheet">


    </head>
  <body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="bienvenida.php">AgroTec</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>

            <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $usuario; ?><i class="fas fa-user fa-fw"></i></a>
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
        <?php if($rol == 1){ ?>
        <div id="layoutSidenav">
         <?php include "barra_lateral.php"; ?>

 <div id="layoutSidenav_content">
  <main>
    
<v-app id="app">    
    <v-data-table :headers="headers" :items="cultivos" :search="search" sort-by="id" class="elevation-2 mx-4" :footer-props="{

      showFirstLastPage: true,
      firstIcon: 'mdi-arrow-collapse-left',
      lastIcon: 'mdi-arrow-collapse-right',
      prevIcon: 'mdi-minus',
      nextIcon: 'mdi-plus'
    }">     
      <template v-slot:top>


        <v-toolbar flat color="green lighten-4">

            <template v-slot:extension>
            <v-btn
              fab
              color="green darken-1"
              bottom
              left
              absolute
              @click="dialog = !dialog"
            >
              <v-icon>mdi-plus</v-icon>
            </v-btn>
          </template>            
          <v-toolbar-title class="dark--text">Datos de Cultivos    &nbsp;<v-icon>mdi-arrow-bottom-right</v-icon></v-toolbar-title>

            <!-- <v-divider class="mx-4" inset vertical></v-divider>
            <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="bienvenida.php"> Inicio </a></li>
            </ol>  -->
          <v-spacer></v-spacer>  
         
            <!--  Modal del diálogo para Alta y Edicion    -->
          <v-dialog v-model="dialog" max-width="500px" class="modal fade">
            <template v-slot:activator="{ on }"></template>
            <v-card>
                <!-- para el EDICION-->
             <v-card-title  class="green darken-1 white--text">
                <span class="headline">{{ formTitle }}</span>
              </v-card-title>    
                
              <v-card-text>                  
                <v-container>
                  <v-row>
                    <!--EL ID NO SE MODIFICA YA QUE ES AUTOINCREMENTAL EN LA BASE DE DATOS-->
                    <!--<v-col cols="12" sm="6" md="4">
                      <v-text-field v-model="editado.id" label="ID"></v-text-field>
                    </v-col>-->
                    <v-col cols="12" sm="6" md="6">
                      <v-text-field v-model="editado.Nombrec" label="Nombre"></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="6">
                      <v-text-field v-model="editado.TempMin" type="number"  step="1" min="0" label="Temperatura Mínima"></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="6">
                      <v-text-field v-model="editado.TempMax" type="number" step="1" min="0" label="Temperatura Máxima"></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="6">
                      <v-text-field v-model="editado.TempOpt" type="number" step="1" min="0" label="Temperatura Optima"></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="6">
                      <v-text-field v-model="editado.diasGerm" label="Días de Germinación"></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="6">
                      <v-text-field v-model="editado.germDiaHora" label="Germinación Dia/Hora"></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="6">
                      <v-text-field v-model="editado.germNocheHora" label="Germinación Noche/Hora"></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="6">
                      <v-text-field v-model="editado.humRel" type="number"  step="1" min="0" label="Humedad Relativa"></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="6">
                      <v-text-field v-model="editado.humMin" type="number" step="1" min="0" label="Humedad Mínima"></v-text-field>                        
                    </v-col>
                    <v-col cols="12" sm="6" md="6">
                      <v-text-field v-model="editado.humMax" type="number" step="1" min="0" label="Humedad Máxima"></v-text-field>                        
                    </v-col>
                    <v-col cols="12" sm="6" md="6">
                      <v-text-field v-model="editado.epcS1Ciclo" label="Época de Siembra 01"></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="6">
                      <v-text-field v-model="editado.epcS2Ciclo" label="Época de Siembra 02"></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="6">
                      <v-text-field v-model="editado.semVar01" label="Semilla Variedad 01"></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="6">
                      <v-text-field v-model="editado.semVar02" label="Semilla Variedad 02"></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="6">
                      <v-text-field v-model="editado.semVar03" label="Semilla Variedad 03"></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="6">
                      <v-text-field v-model="editado.semVar04" label="Semilla Variedad 04"></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="6">
                      <v-text-field v-model="editado.semVar05" label="Semilla Variedad 05"></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="6">
                      <v-text-field v-model="editado.semVar06" label="Semilla Variedad 06"></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="6">
                      <v-text-field v-model="editado.semHib01" label="Semilla Hibrido 01"></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="6">
                      <v-text-field v-model="editado.semHib02" label="Semilla Hibrido 02"></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="6">
                      <v-text-field v-model="editado.semHib03" label="Semilla Hibrido 03"></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="6">
                      <v-text-field v-model="editado.semHib04" label="Semilla Hibrido 04"></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="6">
                      <v-text-field v-model="editado.semHib05" label="Semilla Hibrido 05"></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="6">
                      <v-text-field v-model="editado.semHib06" label="Semilla Hibrido 06"></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="6">
                      <v-text-field v-model="editado.semHib07" label="Semilla Hibrido 07"></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="6">
                      <v-text-field v-model="editado.semHib08" label="Semilla Hibrido 08"></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="6">
                      <v-text-field v-model="editado.sPFTextura" label="Textura del Suelo"></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="6">
                      <v-text-field v-model="editado.sPFEsctructura" label="Estructura del Suelo"></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="6">
                      <v-text-field v-model="editado.sPFGranulometro" label="Granulometro"></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="6">
                      <v-text-field v-model="editado.sPQNitrogeno" label="Nitrogeno del Suelo"></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="6">
                      <v-text-field v-model="editado.sPQFosforo" label="Fosforo del Suelo"></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="6">
                      <v-text-field v-model="editado.sPQPotasio" label="Potasio del Suelo"></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="6">
                      <v-text-field v-model="editado.sPQCalcio" label="Calcio del Suelo"></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="6">
                      <v-text-field v-model="editado.spQPH" label="PH del Suelo"></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="6">
                      <v-text-field v-model="editado.sPM01" label="Propiedad Microbiologica 01"></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="6">
                      <v-text-field v-model="editado.sPM02" label="Propiedad Microbiologica 02"></v-text-field>
                    </v-col>

                 </v-row>
                </v-container>
              </v-card-text>
              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="blue-grey" class="ma-2 white--text" @click="cancelar">Cancelar</v-btn>
                <v-btn color="teal accent-4" class="ma-2 white--text"  @click="guardar">Guardar</v-btn>
              </v-card-actions>
            </v-card>
          </v-dialog>
        </v-toolbar>
           <!-- Barra de búsqueda  -->
          <v-col cols="12" sm="12">
             <v-text-field v-model="search" append-icon="search" label="Buscar" single-line hide-details></v-text-field>
          </v-col>
      </template>
      <template v-slot:item.accion="{ item }">        
        <v-btn class="mr-2" fab dark small color="cyan" @click="editar(item)">
        <v-icon dark>mdi-pencil</v-icon>
        </v-btn>   
        <v-btn class="mr-2" fab dark small color="error" @click="borrar(item)">
        <v-icon dark>mdi-delete</v-icon>
        </v-btn>
      </template>
    </v-data-table>

    <!-- template para el snackbar-->
    <template>
        <div class="text-center ma-2">
        <v-snackbar v-model="snackbar">
          {{ textSnack }}
          <v-btn color="info" text @click="snackbar = false">Cerrar</v-btn>
        </v-snackbar>
        </div>
    </template>
     <!-- template para el footer-->
    


   <!--  <template>
      <v-card height="40" class="mx-4 mt-3">
        <v-footer
          absolute
          class="font-weight-medium"
          color="indigo"
        >
          <v-col
            class="text-center white--text"
            cols="12"
          >
            {{ new Date().getFullYear() }} — <strong >AGROTEC</strong>
          </v-col>
        </v-footer>
      </v-card>
    </template>   --> 





</v-app>

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

        <!-- ARCHIVOS PARA BD -->        
        <script src="js_tablas/vue.js"></script>
        <script src="js_tablas/vuetify.js"></script>
        <!--Axios -->      
        <script src="js_tablas/axios.js"></script>     
        <script src="mainCultivo.js"></script>
    </body>
        <?php } ?>

</html>
