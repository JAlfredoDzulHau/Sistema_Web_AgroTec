<?php 
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        header("location: bienvenida.php");
        exit;
    }

$password_err = "";
session_start();
if(!empty($_SESSION['active']))
	{
    	header('location: bienvenida.php');
	}else{
    	if(!empty($_POST))
	    {
	        if(empty($_POST['usuario']) || empty($_POST['clave']))
	        {
	            $password_err = "Ingrese su usuario y su contraseña";
	        }else{

	            require_once "usuario/conexion.php";

	            $user = mysqli_real_escape_string($conection,$_POST['usuario']);
	            $pass = md5(mysqli_real_escape_string($conection,$_POST['clave']));

	            $query = mysqli_query($conection,"SELECT * FROM usuarios WHERE usuario= '$user' AND clave = '$pass'");
	            mysqli_close($conection);
	            $result = mysqli_num_rows($query);

	            if($result > 0)
	            {
	                $data = mysqli_fetch_array($query);
	                $_SESSION['active'] = true;
	                                        $_SESSION["loggedin"] = true;

	                $_SESSION['idUser'] = $data['id_usuario'];
	                $_SESSION['nombre'] = $data['nombre'];
	                $_SESSION['user']   = $data['usuario'];
	                $_SESSION['rol']    = $data['rol'];

	                header('location: bienvenida.php');
	            }else{
	                $password_err = "El usuario o la contraseña son incorrectos";
	            }
	        }
	    }		
	}
 ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>AgroTec</title>
    <link rel="stylesheet" href="css/estilos.css">

    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="shortcut icon" href="images/LogoPlantaTech.png">

    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">

</head>

<body>

    <div class="container-all">

        <div class="ctn-form">
            <img src="images/LogoPlantaTech.png" alt="" class="logo">
            <h1 class="title">Iniciar Sesión</h1>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                <label for="">Usuario</label>
                <input type="text" name="usuario" required>
                <span class="msg-error"><?php echo $usuario_err; ?></span>
                <label for="">Contraseña</label>
                <input type="password" name="clave" required>
                <span class="msg-error"><?php echo $password_err; ?></span>

                <input type="submit" value="Iniciar">

            </form>

            <span class="text-footer">¿Aún no te has registrado?
                <a href="register.php">Registrate</a>
            </span>
        </div>

        <div class="ctn-text" >
            <div class="capa" align="center"></div>
            
            <style>
            .box-green {
            background-color: #138D7590;
            border:2px solid #008080;
            border-radius: 10px;
            text-align: center;
            width: 350px;
            }
            .box-yellow {
            background-color: #4A235A95;
            border:2px solid #FFFF00;
            border-radius: 10px;
            text-align: center;
            height: 100px;
            width: 420px;
            align-items: center;
            }
            </style>
            <br>
            <center>
                <div class="box-green"><h1  style="color: yellow;">Sistema Web AgroTec</h1></div>
            </center>
            <br>
            <div class="box-yellow"><p style="color: white; "><br>SIMULACIÓN DE DATOS EDAFOCLIMÁTICOS PARA MODELAR LA PRODUCCIÓN DE HORTALIZAS EN EL CAMINO REAL DEL ESTADO DE CAMPECHE</p></div>
        </div>

    </div>

</body>

</html>
