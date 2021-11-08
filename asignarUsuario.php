<?php
include_once('conexion.php');
// Existe usuario?
if (!isset($_SESSION['user_nombre_completo'])) {
        // Reenvio al usuario para finalizar el login
    $forw = 'login.php';
    header(sprintf("Location: %s", $forw));
}

var_dump($_POST);

if ($_POST['id_materia'] != 0 && $_POST['dni_alumno'] != 0) {

    // previamente se deberia hacer un sleect con el checkeo de existencia

    $query2 = "INSERT into edibis.relacion_usuario_materia (id_materia, dni_alumno)
    VALUES
    (
      '" . $_POST['id_materia'] . "',
      '" . $_POST['dni_alumno'] . "'
      
      )
    ";
    $stmt = $cnPDO->prepare($query2);
    $stmt->execute();
}else{
    echo "lke recomiendo ññenar elñ formulario";
}





$materias = $cnPDO->query("SELECT * FROM edibis.materia");
$alumnos = $cnPDO->query("SELECT * FROM edibis.usuarios where Tipo_Perfil = 1");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edibis | Nueva Materia</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    </head>

    <body>

    <?php include_once "nav.php"; ?>

        <form method="post" accept-charset="utf-8" role="form" id="validacion" action="" class="m-2">


<div class="row">
<div class="col-md-12">
        <h3>Asignar usuario</h3>
</div>
<div class="col-md-6">
    <h4>Materias</h4>

    <select name="id_materia" id="id_materia" class="form-control"> 
    <option value='0'> -- Señeccionar una materia -- </option>
                    <?php
                    foreach ($materias AS $materia) {
                        echo "<option value='" . $materia['Id_Materia'] . "'>" . $materia['Nombre_Materia'] . "</option>";
                    }
                    ?>

    </select>
</div>
<div class="col-md-6">
    <h4>Alumnos</h4>

    <select name="dni_alumno" id="dni_alumno" class="form-control"> 
    <option value='0'> -- Señeccionar un alumno -- </option>
                    <?php
                    foreach ($alumnos AS $alumno) {
                        echo "<option value='" . $alumno['Dni'] . "'>" . $alumno['Apellido'] ." ". $alumno['Nombre'] . "</option>";
                    }
                    ?>

    </select>
</div>
<div class="col-md-12">
    <button class="btn btn-primary" type="submit">Asignar Usuario</button>
</div>
</div>


        </form>
<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    -->

    </body>


</html>
