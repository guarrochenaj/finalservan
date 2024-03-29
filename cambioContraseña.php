<?php
include_once('conexion.php');

// Existe usuario?
if(!isset($_SESSION['user_nombre_completo'])){
    // Reenvio al usuario para finalizar el login
    $forw = 'login.php';
    header(sprintf("Location: %s", $forw));

}


if(isset($_POST['contrasena']) && $_POST['contrasena'] == $_POST['contrasena2']){
    $query ="UPDATE edibis.usuarios 
            SET `Contrasena`= '".$_POST['contrasena']."' 
            WHERE Dni = (".$_SESSION['user_id'].")";
    $stmt = $cnPDO->prepare($query);
    $stmt->execute();

    // prueba logout
        session_name("SesionesEdibis");
        session_start();
    
    
    //authenticated user request
        session_destroy();
        $parametros_cookies = session_get_cookie_params(); 
        setcookie(session_name(),0,1,$parametros_cookies["path"]);
    
                unset($_SESSION);
    
        session_unset();
    
    // Reenvio con mensaje 6 "Deslogueado"
        header(sprintf("Location: %s", "login.php"));
        exit;
    
    };


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edibis | Modificar Contraseña</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</head>

<?php include_once "nav.php";?>

<body>
    <h3>Modificar Contraseña</h3>
    <form name="nueva_contraseña" id="nueva_contraseña" method="post">
     
     Nueva Contraseña: <input type="password" required id="contrasena" name="contrasena" class="m-1"><br>
     Confirme Contraseña:<input type="password" required id="contrasena2" name="contrasena2" class="m-1"><br>

     <input type="submit" class="m-2"><input type="reset" class="m-1">
     </form>

</body>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</html>