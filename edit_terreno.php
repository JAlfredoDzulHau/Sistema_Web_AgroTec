<?php
	include_once 'conexion.php';

	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];

		$buscar_id=$con->prepare('SELECT * FROM dat_terreno WHERE id=:id LIMIT 1');
		$buscar_id->execute(array(
			':id'=>$id
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: Terreno.php');
	}


	if(isset($_POST['guardar'])){
		$nombre=$_POST['nombre'];
		$direccion=$_POST['direccion'];
		$id=(int) $_GET['id'];

		if(!empty($nombre) && !empty($direccion)){
			if(!$nombre){
				echo "<script> alert('Error');</script>";
			}else{
				$consulta_update=$con->prepare(' UPDATE dat_terreno SET  
					nombre=:nombre,
					direccion=:direccion
					WHERE id=:id;'
				);
				$consulta_update->execute(array(
					':nombre' =>$nombre,
					':direccion' =>$direccion,
					':id' =>$id
				));
				header('Location: Terreno.php');
			}
		}else{
			echo "<script> alert('Los campos estan vacios');</script>";
		}
	}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Editar Cliente</title>
	<link rel="stylesheet" href="css/estilox.css">
</head>
<body>
	<div class="contenedor">
		<h2>CRUD EN PHP CON MYSQL</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="nombre" value="<?php if($resultado) echo $resultado['nombre']; ?>" class="input__text">
				<input type="text" name="direccion" value="<?php if($resultado) echo $resultado['direccion']; ?>" class="input__text">
			</div>
			<div class="btn__group">
				<a href="Terreno.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
