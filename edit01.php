<?php

    session_start();
    $usuario = $_SESSION["user"];    
    $rol = $_SESSION["rol"];

    $id = $_SESSION["id"];
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../index.php");
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>AgroTec</title>
<link type="text/css" href="bootstrap.min.css" rel="stylesheet">
<link type="text/css" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css" rel="stylesheet">
<style>
table {
    border-collapse: collapse;
    width: 100%;
}
th, td {
    text-align: left;
    padding: 4px;
}
tr:nth-child(even){background-color: #10914a}
th {
    background-color: #10914a;
    color: white;
}
.main-wrapper{
	width:50%;
	
	background:#21db75;
	border: solid #04381c;
	border-radius: 10px;
	padding:25px;
}
hr {
    margin-top: 5px;
    margin-bottom: 5px;
    border: 0;
    border-top: 1px solid #eee;
}
</style>
</head>

<body>
<?php if($rol == 1){ ?>
<div class="main-wrapper">
<h1>Editar información del Terreno </h1>
<br>
<?php 
include("function.php");
$id = $_GET['id'];
select_id('dat_terrenos','id',$id);
?>
<form action="" method="post">
	<label><strong>Nombre:</strong></label>
	<input type="text" value="<?php echo $row->nombre;?>" name="nombre">
	<label><strong>Dirección:</strong></label>
	<input type="text" value="<?php echo $row->direccion;?>" name="direccion">
	<input type="submit" name="submit" value="Actualizar Datos">
</form>

<?php
	
	if(isset($_POST['submit'])){
		$field = array("nombre"=>$_POST['nombre'], "direccion"=>$_POST['direccion']);
		$tbl = "dat_terrenos";
		edit($tbl,$field,'id',$id);
		
		//Redireccionar a pagina anterior:
		if ($id == 1) {
			header("location:T_Becal.php");		
		}else if ($id == 2) {
			header("location:T_Dzitbalché.php");	
		}else if ($id == 3) {
			header("location:T_Calkiní.php");
		}else if ($id == 4) {
			header("location:T_Helcelchakán.php");
		}else if ($id == 5) {
			header("location:T_ChunHuas.php");
		}else if ($id == 6) {
			header("location:T_Xcolok.php");
		}else if ($id == 7) {
			header("location:T_Tepakan.php");
		}else if ($id == 8) {
			header("location:T_Maxcanu.php");
		}else if ($id == 9) {
			header("location:T_Halacho.php");
		}else {
			header("location:index.php");
		}

	}
?>
</div>
</body>
<?php } ?>
</html>