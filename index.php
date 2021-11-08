<?PHP
include_once('conexion.php');

    // Existe usuario?
    if(!isset($_SESSION['user_nombre_completo'])){
            // Reenvio al usuario para finalizar el login
           $forw = 'login.php';
           header(sprintf("Location: %s", $forw));
    }

    $Dni = $_SESSION['user_id'];

    if($_SESSION['user_perfil'] == 1){
        $lista_de_materias_cursadas = 
        $cnPDO->query("SELECT M.Id_Materia, M.Nombre_Materia, U.Dni, U.Apellido, U.Nombre FROM relacion_usuario_materia RUM
        LEFT JOIN materia M ON M.Id_Materia = RUM.id_materia
        LEFT JOIN usuarios U ON U.Dni = RUM.dni_alumno
        WHERE RUM.dni_alumno = '". $Dni);
    }else{
        $lista_de_materias_dictadas = $cnPDO->query("SELECT Nombre_Materia FROM edibis.materia where Dni = ". $Dni);
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



    <body>
    <?php include_once "nav.php";?>
    <h2>¡Hola <?= $_SESSION['user_nombre_completo'] ?>!</h2>
    <h3>Estas son tus aulas</h3>


   <!-- visualizacion de aulas-->
<?PHP
   if($_SESSION['user_perfil'] == 1){?>

        <ul>
                    
                    <?php
                       
                       foreach ($lista_de_materias_cursadas AS $row) { ?>
                           <li><a href="#" target="_blank
                           "><?= $row['Nombre_Materia']; ?></a></li>
                       <?PHP 
                       };
                    ?>
        
        </ul>

    <?PHP }else{?>

        <ul>
                    
                    <?php
                       
                        foreach ($lista_de_materias_dictadas AS $row) { ?>
                            <li><a href="#" target="_blank
                            "><?= $row['Nombre_Materia']; ?></a></li>
                        <?PHP 
                        };
                    ?>
                            
    
    
        </ul>

        <?PHP }?>








    <!-- fin visualizacion de aulas-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>



</body>
</html>
