<?php require('templates/conexion.php') ?>
<!DOCTYPE html>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8">
    <link href="/landing/css/styles.css" rel="stylesheet" >
    <?php 
    $user = '';
    $email = '';
    $pw = '';
    $confirmpw = '';
    $error_vacio = false;
    $error_match = false;
    if( isset( $_POST['registrar'])){
        $user = $_POST['usuario'];
        $email = $_POST['email'];
        $pw = $_POST['pass'];
        $confirmpw = $_POST['confirmpass'];
        if($pw != $confirmpw){
            $error_match = true;
        } else if(empty($user) || empty($pw) || empty($email)){
            $error_vacio = true;
        } else{
           $registraruser = $coneccion->query("INSERT INTO `user_db`(`user`, `correo`, `password`) VALUES ('$user','$email','$pw')");
           if($registraruser){
            header('location: http://localhost/landing/index.php');
            die();
           } else {
            die("fallo");
           }
        }
    }
    

    ?>
    </head>
    <body>
    <header>
        <nav class="nav-bar">
            <div class="content-nav">
                <div><a href="index.php">Inicio</a></div>
            </div>
            <div class="nav-buttons">
                </div>
        </nav>
    </header>
    <div class="body-content">
         <div class="login">
            <div class="formulario">
            <form method="post" action="register.php">
                <?php if($error_vacio): ?> 
                <div>
                    Debes llenar todos los campos
                </div>
                <?php endif; ?>
                <?php if($error_match): ?> 
                <div>
                    contraseña no coincide
                </div>
                <?php endif; ?>
                
            <input type="text" name="usuario" class="text-class" placeholder="Nombre de usuario" require>
            <input type="email" name="email" class="text-class" placeholder="Ingresa tu correo" require>
            <input type="password" name="pass" class="text-class" placeholder="Introduce tu contraseña" require>
            <input type="password" name="confirmpass" class="text-class" placeholder="Confirma tu contraseña" require>
            <input type="submit" name="registrar" value="Registrar" class="boton-class">
            <a href="login.php">Iniciar sesion.</a>
         </form>
         </div>
    </div>
    </body>
    <footer>
    </footer>
</html>