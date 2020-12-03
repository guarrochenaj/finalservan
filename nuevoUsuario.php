<?php
include_once('conexion.php');

// Existe usuario?
if(!isset($_SESSION['user_nombre_completo'])){
    // Reenvio al usuario para finalizar el login
    $forw = 'login.php';
    header(sprintf("Location: %s", $forw));

}


if(isset($_POST['Dni']) && $_POST['Dni'] != ''){
$query = "INSERT into edibis.usuarios (Dni, Usuario, Contrasena, Tipo_Perfil, Nombre, Apellido, Email, Fecha_Nacimiento, Pais, Provincia, Ciudad, Direccion)
VALUES
(
  '".$_POST['Dni']."',
  '".$_POST['Usuario']."',
  '".$_POST['contrasena']."',
  '".$_POST['Tipo_Perfil']."',
  '".$_POST['Nombre']."',
  '".$_POST['Apellido']."',
  '".$_POST['Email']."',
  '".$_POST['Fecha_nacimiento']."',
  '".$_POST['Pais']."',
  '".$_POST['Provincia']."',
  '".$_POST['Ciudad']."',
  '".$_POST['Direccion']."'
  )
";
$stmt = $cnPDO->prepare($query);
$stmt->execute();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edibis | Nuevo Usuario</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</head>

<?php include_once "nav.php";?>

<body>
    <form name="nuevo_usuario" id="nuevo_usuario" method="post">
     Numero de documento: <input type="number" id="Dni" name="Dni" required class="m-1"><br>
     Usuario: <input type="text" required id="Usuario" name="Usuario" class="m-1"><br>
     Contraseña: <input type="password" required id="contrasena" name="contrasena" class="m-1"><br>
     Perfil: <select id="Tipo_Perfil" required class="m-1" name="Tipo_Perfil">
         <option value="1">Alumno</option>
         <option value="2">Maestro</option>
     </select> <br>
     Nombre: <input type="text" required id="Nombre" name="Nombre" class="m-1"><br>
     Apellido: <input type="text" required id="Apellido" name="Apellido" class="m-1"><br>
     Email: <input type="mail" required id="Email" name="Email" class="m-1"><br>
     Fecha de nacimiento: <input type="date" required id="Fecha_nacimiento" name="Fecha_nacimiento" class="m-1"><br>
     Pais: <input type="text" id="Pais" name="Pais" class="m-1"><br>
     Provincia: <input type="text" id="Provincia" name="Provincia" class="m-1"><br>
     Ciudad: <input type="text" id="Ciudad" name="Ciudad" class="m-1"><br>
     Direccion: <input type="text" id="Direccion" name="Direccion"  class="m-1"><br><br>
     <input type="submit" class="m-2"><input type="reset" class="m-1">
     </form>

</body>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</html>