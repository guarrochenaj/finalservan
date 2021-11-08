<?php
include_once('conexion.php');

// Existe usuario?
if(!isset($_SESSION['user_nombre_completo'])){
        // Reenvio al usuario para finalizar el login
       $forw = 'login.php';
       header(sprintf("Location: %s", $forw));
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edibis | Home</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    
    </head>

    <?php include_once "nav.php";?>

    <body>
        <h3> Perfil</h3>
            <p><b>Numero de documento:</b> <?php echo $_SESSION['user_id'] ?></p>
            <p><b>Usuario:</b> <?php echo $_SESSION['user'] ?></p>
            <p><b>Nombre:</b> <?php echo $_SESSION['user_nombre'] ?></p>
            <p><b>Apellido:</b> <?php echo $_SESSION['user_apellido'] ?></p>
            <p><b>Email:</b> <?php echo $_SESSION['user_email'] ?></p>
            <p><b>Fecha de nacimiento:</b> <?php echo $_SESSION['f_nacimiento'] ?></p>
            <p><b>Pais:</b> <?php echo $_SESSION['pais'] ?></p>
            <p><b>Provincia:</b> <?php echo $_SESSION['provincia'] ?></p>
            <p><b>Ciudad:</b> <?php echo $_SESSION['ciudad'] ?></p>
            <p><b>Direccion:</b> <?php echo  $_SESSION['direccion']?></p>
            
    <a href="modificarDatos.php" class="btn btn-primary p-3 m-3">Modificar<br>Datos</a>
    <a href="cambioContraseña.php" class="btn btn-primary p-3 m-3">Modificar<br>Contraseña</a>

    </body>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</html>