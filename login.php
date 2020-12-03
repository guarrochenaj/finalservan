<?PHP
include_once('conexion.php');
// Incluimos e iniciamos los Controladores de esta pantalla
if (isset($_POST['inputEmail'])) {
    // Select email usuario
    //cnPDO

    $query = "SELECT * from edibis.usuarios where Dni = '".$_POST['inputEmail']."'";
    $stmt = $cnPDO->prepare($query);
    $stmt->execute();
    $count = $stmt->rowCount();

    $datos_del_select = $stmt->fetch(PDO::FETCH_ASSOC);

    // Existe usuario?
    if($count > 0){
        if($_POST['inputPassword'] == $datos_del_select['Contrasena']){
           // Cargo datos en la sesion
           $_SESSION['user_nombre_completo'] = $datos_del_select['Nombre'] . " " . $datos_del_select['Apellido'];
           $_SESSION['user_email'] = $datos_del_select['Email'] ;
           $_SESSION['user_id'] = $datos_del_select['Dni'] ;
           $_SESSION['user_perfil'] = $datos_del_select['Tipo_Perfil'] ;
           $_SESSION['user'] = $datos_del_select['Usuario'] ;
           $_SESSION['user_nombre'] = $datos_del_select['Nombre'] ;
           $_SESSION['user_apellido'] = $datos_del_select['Apellido'] ;
           $_SESSION['f_nacimiento'] = $datos_del_select['Fecha_Nacimiento'] ;
           $_SESSION['pais'] = $datos_del_select['Pais'] ;
           $_SESSION['provincia'] = $datos_del_select['Provincia'] ;
           $_SESSION['ciudad'] = $datos_del_select['Ciudad'] ;
           $_SESSION['direccion'] = $datos_del_select['Direccion'] ;
            // Reenvio al usuario para finalizar el login
           $forw = 'index.php';
           header(sprintf("Location: %s", $forw));
        }
    }

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

    <nav class="">
        <a href="index.php"><img src="ed.png" width="125px"></a>
        </nav>

<body>
<pre>

</pre>
    <div class="" style="background-image: url(http://lorempixel.com/350/230/); height: 230px; width: 350px; float: none; margin-left: 33%;" >
         <form class="form-signin" name="frm_ingreso" id="frm_ingreso" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <div class="input-group">
                    <input name="inputEmail" id="inputEmail" type="text" class="m-2" placeholder="Numero documento" >
                    <span class="input-group-btn">
                        
                    </span>
                </div>
                <br><br>
                <div class="input-group">
                    <input name="inputPassword" id="inputPassword" type="password" placeholder="Password" class="mx-2" >
                    <span class="input-group-btn">
    
                    </span>
                </div>

                <div class="separador"></div>

                <div class="row">
                    <div class="">
                        <button type="submit" class="btn btn-primary btn-block btn-flat mt-5 ml-4">Ingresar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    
    


</body>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</html>

