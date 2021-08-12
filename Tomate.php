<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT * FROM tomate";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$tomate=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<!--    Datatables  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>  
    <title></title>
    <style>
        table.dataTable thead {
            background: linear-gradient(to right, #0575E6, #00F260);
            color:white;
        }
    </style>  
      
  </head>
  <body>
    <h1 class="text-center">Datatables</h1>
      
    <h3 class="text-center">Consumiendo datos desde MySQL - PHP - Foreach</h3>
    
    <div class="container">
       <div class="row">
           <div class="col-lg-12">
            <table id="tablaTomate" class="table-striped table-bordered" style="width:100%">
                <thead class="text-center">
                    <th>id</th>
                    <th>TempMini</th>
                    <th>TemMax</th>
                    <th>TemOpt</th>
                    <th>Germinacion</th>
                    <th>GerDiaHora</th>
                    <th>GerNocheHora</th>
                    <th>HumRelat</th>
                    <th>HumMini</th>
                    <th>HumMax</th>
                    <th>1er_Ciclo</th>
                    <th>2do_Ciclo</th>
                    <th>Tipo_01</th>
                    <th>Tipo_02</th>
                    <th>Tipo_03</th>
                    <th>Tipo_04</th>
                    <th>Tipo_05</th>
                    <th>Tipo_06</th>
                    <th>Hibrido_01</th>
                    <th>Hibrido_02</th>
                </thead>
                <tbody>
                    <?php
                        foreach($tomate as $tabtomate){
                    ?>
                    <tr>
                        <td><?php echo $tabtomate['id']?></td>
                        <td><?php echo $tabtomate['TempMini']?></td>
                        <td><?php echo $tabtomate['TemMax']?></td>
                        <td><?php echo $tabtomate['TemOpt']?></td>
                        <td><?php echo $tabtomate['Germinacion']?></td>
                        <td><?php echo $tabtomate['GerDiaHora']?></td>
                        <td><?php echo $tabtomate['GerNocheHora']?></td>
                        <td><?php echo $tabtomate['HumRelat']?></td>
                        <td><?php echo $tabtomate['HumMini']?></td>
                        <td><?php echo $tabtomate['HumMax']?></td>
                        <td><?php echo $tabtomate['1er_Ciclo']?></td>
                        <td><?php echo $tabtomate['2do_Ciclo']?></td>
                        <td><?php echo $tabtomate['Tipo_01']?></td>
                        <td><?php echo $tabtomate['Tipo_02']?></td>
                        <td><?php echo $tabtomate['Tipo_03']?></td>
                        <td><?php echo $tabtomate['Tipo_04']?></td>
                        <td><?php echo $tabtomate['Tipo_05']?></td>
                        <td><?php echo $tabtomate['Tipo_06']?></td>
                        <td><?php echo $tabtomate['Hibrido_01']?></td>
                        <td><?php echo $tabtomate['Hibrido_02']?></td>
                       
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
           </div>
       </div> 
    </div>
   
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
      
      
<!--    Datatables-->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>  
      
      
    <script>
      $(document).ready(function(){
         $('#tablaTomate').DataTable(); 
      });
    </script>
      
      
  </body>
</html>