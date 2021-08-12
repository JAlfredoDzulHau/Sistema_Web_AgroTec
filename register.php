<?php 
    
    include 'code-register.php';

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
            <h1 class="title">Registrarse</h1>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
               
                <label for="">Nombre</label>
                <input type="text" name="username" required>
                <span class="msg-error"><?php echo $username_err; ?></span>
                <label for="">Usuario</label>
                <input type="text" name="usuario" required>
                <span class="msg-error"> <?php echo $usuario_err; ?></span>
                <label for="">Contraseña</label>
                <input type="password" name="password" pattern="[A-Za-z][A-Za-z0-9]*[0-9][A-Za-z0-9]*" title="La contraseña debe empezar con una letra y contener al menos un dígito." required>
                <span class="msg-error"> <?php echo $password_err; ?></span>

                <input type="submit" value="Registrarse">

            </form>

            <span class="text-footer">¿Ya te has registrado?
                <a href="index.php">Iniciar Sesión</a>
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
