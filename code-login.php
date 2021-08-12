<?php

    //INICIALIZAR LA SESION
    session_start();
    
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){

        header("location: bienvenida.php");
        exit;
    }

require_once "conexion.php";

$usuario = $password ="";
$usuario_err = $password_err = "";

if($_SERVER["REQUEST_METHOD"] === "POST"){
    
    if(empty(trim($_POST["usuario"]))){
        $usuario_err = "Por favor, ingrese su usuario";
    }else{
        $usuario = trim($_POST["usuario"]);
    }
    
    if(empty(trim($_POST["password"]))){
        $password_err = "Por favor, ingrese su contraseña";
    }else{
        $password = trim($_POST["password"]);
    }
    
    
    

    //VALIDAR CREDENCIALES
    if(empty($usuario_err) && empty($password_err)){
        
        $sql = "SELECT id_usuario, nombre, usuario, clave, rol, estatus FROM usuarios WHERE usuario = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            
            mysqli_stmt_bind_param($stmt, "s", $param_usuario);
            
            $param_usuario = $usuario;
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
            }
            
            if(mysqli_stmt_num_rows($stmt) == 1){
                mysqli_stmt_bind_result($stmt, $id_usuario, $nombre, $usuario, $hashed_password, $rol, $estatus);
                if(mysqli_stmt_fetch($stmt)){
                    if(password_verify($password, $hashed_password)){
                        session_start();
                        
                        // ALMACENAR DATOS EN VARABLES DE SESION
                        $_SESSION["loggedin"] = true;
                        $_SESSION["id_usuario"] = $id_usuario;
                        $_SESSION["usuario"] = $usuario;
                        $_SESSION["nombre"] = $nombre;
                        $_SESSION["rol"] = $rol;
                        $_SESSION["estatus"] = $estatus;
                        

                       header("location: bienvenida.php");


                    }else{
                        $password_err = "La contraseña que has introducido no es valida";
                    }
                    
                } 
            }else{
                    $usuario_err = "No se ha encontrado ninguna cuenta con ese correo electronico.";
                }
            
        }else{
                    echo "UPS! algo salio mal, intentalo mas tarde";
                }
    }
    
    mysqli_close($link);
    
}

?>
























