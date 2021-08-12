<?php 
	
	session_start();
	if($_SESSION['rol'] != 1)
	{
		header("location: ./");
	}

	include "../conexion.php";

	if(!empty($_POST))
	{
		$alert='';
		if(empty($_POST['nombre']) || empty($_POST['usuario'])  || empty($_POST['rol']))
		{
			$alert='<p class="msg_error">Todos los campos son obligatorios.</p>';
		}else{

			$idUsuario = $_POST['id_Usuario'];
			$nombre = $_POST['nombre'];
			$user   = $_POST['usuario'];
			$clave  = md5($_POST['clave']);
			$rol    = $_POST['rol'];


			$query = mysqli_query($conection,"SELECT * FROM usuarios 
													   WHERE (usuario = '$user' AND id_usuario != $idUsuario)
													   OR (nombre = '$nombre' AND id_usuario != $idUsuario) ");

			$result = mysqli_fetch_array($query);

			if($result > 0){
				$alert='<p class="msg_error">El nombre o el usuario ya existe.</p>';
			}else{

				if(empty($_POST['clave']))
				{

					$sql_update = mysqli_query($conection,"UPDATE usuarios
															SET nombre = '$nombre', usuario='$user',rol='$rol'
															WHERE id_usuario= $idUsuario ");
				}else{
					$sql_update = mysqli_query($conection,"UPDATE usuarios
															SET nombre = '$nombre', usuario='$user',clave='$clave', rol='$rol'
															WHERE id_usuario= $idUsuario ");

				}

				if($sql_update){
					$alert='<p class="msg_save">Usuario actualizado correctamente.</p>';
						$url ="lista_usuarios.php"; // aqui pones la url
						$tiempo_espera = 1; // Aquí se configura cuántos segundos hasta la actualización.
						// Declaramos la funcion para la redirección
						header("refresh: $tiempo_espera; url=$url");
				}else{
					$alert='<p class="msg_error">Error al actualizar el usuario.</p>';
				}

			}


		}

	}

	//Mostrar Datos
	if(empty($_REQUEST['id']))
	{
		header('Location: lista_usuarios.php');
		mysqli_close($conection);
	}
	$iduser = $_REQUEST['id'];

	$sql= mysqli_query($conection,"SELECT u.id_usuario,u.nombre,u.usuario, (u.rol) as id_rol, (r.rol) as rol
									FROM usuarios u
									INNER JOIN rol r
									on u.rol = r.id_rol
									WHERE id_usuario= $iduser ");
	mysqli_close($conection);
	$result_sql = mysqli_num_rows($sql);

	if($result_sql == 0){
		header('Location: lista_usuarios.php');
	}else{
		$option = '';
		while ($data = mysqli_fetch_array($sql)) {
			# code...
			$iduser  = $data['id_usuario'];
			$nombre  = $data['nombre'];
			$usuario = $data['usuario'];
			$id_rol   = $data['id_rol'];
			$rol     = $data['rol'];

			if($id_rol == 1){
				$option = '<option value="'.$id_rol.'" select>'.$rol.'</option>';
			}else if($id_rol == 2){
				$option = '<option value="'.$id_rol.'" select>'.$rol.'</option>';	
			}else if($id_rol == 3){
				$option = '<option value="'.$id_rol.'" select>'.$rol.'</option>';
			}


		}
	}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>AgroTec | Actualizar Usuario</title>
	<link rel="shortcut icon" href="../../images/LogoPlantaTech.png">
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		
		<div class="form_register">
			<h1>Actualizar usuario</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

			<form action="" method="post">
				<input type="hidden" name="id_Usuario" value="<?php echo $iduser; ?>">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" id="nombre" placeholder="Nombre completo" value="<?php echo $nombre; ?>">
				<label for="usuario">Usuario</label>
				<input type="text" name="usuario" id="usuario" placeholder="Usuario" value="<?php echo $usuario; ?>">
				<label for="clave">Contraseña</label>
				<input type="password" name="clave" id="clave" placeholder="ACTUALIZAR Contraseña">
				<label for="rol">Tipo Usuario</label>

				<?php 
					include "../conexion.php";
					$query_rol = mysqli_query($conection,"SELECT * FROM rol");
					mysqli_close($conection);
					$result_rol = mysqli_num_rows($query_rol);

				 ?>

				<select name="rol" id="rol" class="notItemOne">
					<?php
						echo $option; 
						if($result_rol > 0)
						{
							while ($rol = mysqli_fetch_array($query_rol)) {
					?>
							<option value="<?php echo $rol["id_rol"]; ?>"><?php echo $rol["rol"] ?></option>
					<?php 
								# code...
							}
							
						}
					 ?>
				</select>
				<input type="submit" value="Actualizar usuario" class="btn_save">

			</form>


		</div>


	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>