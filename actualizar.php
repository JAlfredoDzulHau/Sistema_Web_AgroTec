<?php
	include_once 'conexion.php';

	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];

		$buscar_id=$con->prepare('SELECT * FROM cultivos2 WHERE id=:id LIMIT 1');
		$buscar_id->execute(array(
			':id'=>$id
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: index.php');
	}


	if(isset($_POST['guardar'])){
		$tempMin=$_POST['tempMin'];
		$tempMax=$_POST['tempMax'];
		$tempOpt=$_POST['tempOpt'];
		$id=(int) $_GET['id'];

		if(!empty($tempMin) && !empty($tempMax) && !empty($tempOpt) ){
			if(!filter_var($correo,FILTER_VALIDATE_EMAIL)){
				echo "<script> alert('Correo no valido');</script>";
			}else{
				$consulta_update=$con->prepare(' UPDATE clientes SET  
					tempMin=:tempMin,
					tempMax=:tempMax,
					tempOpt=:tempOpt,
					WHERE id=:id;'
				);
				$consulta_update->execute(array(
					':tempMin' =>$tempMin,
					':tempMax' =>$tempMax,
					':tempOpt' =>$tempOpt,
					':id' =>$id
				));
				header('Location: index.php');
			}
		}else{
			echo "<script> alert('Los campos estan vacios');</script>";
		}
	}

?>











<?php
	include_once 'conexion.php';

	$sentencia_select=$con->prepare('SELECT *FROM cultivos2 ORDER BY id DESC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT *FROM cultivos2 WHERE tempMin LIKE :campo OR tempMax LIKE :campo;'
		);

		$select_buscar->execute(array(
			':campo' =>"%".$buscar_text."%"
		));

		$resultado=$select_buscar->fetchAll();

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
				<input type="text" name="tempMin" value="<?php if($resultado) echo $resultado['tempMin']; ?>" class="input__text">
				<input type="text" name="tempMax" value="<?php if($resultado) echo $resultado['tempMax']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="tempOpt" value="<?php if($resultado) echo $resultado['tempOpt']; ?>" class="input__text">
				
			</div>
		</form>
	</div>
</body>
</html>
