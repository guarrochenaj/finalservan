<?php
include_once('conexion.php');



// Existe usuario?
if (!isset($_SESSION['user_nombre_completo'])) {
        // Reenvio al usuario para finalizar el login
    $forw = 'login.php';
    header(sprintf("Location: %s", $forw));
}

//insersion clase en db
if(isset($_POST['Titulo']) && $_POST['Titulo'] != ''){
    $query2 = "INSERT into edibis.clases (Id_Materia, Titulo, Contenido)
    VALUES
    (
      '".$_POST['Nombre_Materia']."',
      '".$_POST['Titulo']."',
      '".$_POST['Contenido']."'
      )
    ";
    $stmt = $cnPDO->prepare($query2);
    $stmt->execute();
    }


$Dni = $_SESSION['user_id'];

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

    <?php include_once "nav.php"; ?>

    <body>

    <h3> Nueva Clase</h3>
        <form method="post" accept-charset="utf-8" role="form" id="validacion" action="" class="m-2">
 
            Materia: <select name="Nombre_Materia" id="Nombre_Materia"> 
                <?php
                    $stmt = $cnPDO->query("SELECT Id_Materia, Nombre_Materia FROM edibis.materia where Dni=" . $Dni);
                        while ($row = $stmt->fetch()) {
                            echo "<option value='" . $row['Id_Materia'] . "'>" . $row['Nombre_Materia'] . "</option>\n";
                        }
                    ?>
                </select><br><br>
            Titulo <input type="text" name="Titulo" id="Titulo"><br><br>

            Contenido: <br><textarea name="Contenido" id="Contenido" cols="127" rows="10"></textarea><br>


            <input type="submit" class="m-2">
        </form>

    </body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    
</html>
