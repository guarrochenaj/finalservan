<?PHP
include_once('conexion.php');

    // Existe usuario?
    if(!isset($_SESSION['user_nombre_completo'])){
            // Reenvio al usuario para finalizar el login
           $forw = 'login.php';
           header(sprintf("Location: %s", $forw));
    }

    $id=$_GET['id'];
    
    $infoAula=
    $cnPDO->query("SELECT m.Id_Materia, m.Nombre_Materia, u.Nombre, u.Apellido, c.Id_Clase, c.Titulo, c.Contenido FROM edibis.materia as m
    join edibis.usuarios as u on (m.Dni = u.Dni)
    join edibis.clases as c on (m.Id_Materia = c.Id_Materia)
    where m.Id_Materia=" . $id);
    
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edibis | Aula</title>
    
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    
        
    </head>
    
    
    
            <body>
                <?php include_once "nav.php";?>
                <!--Bienvenida al aula-->
                
                <?php
                    foreach($infoAula as $row){
                ?>
                        <br>
                        <div class="col-sm-4 text-center container">
                            <h1 class="bg-primary p-2 text-white"><?= $row['Titulo'];?></h1>
                                <div class="bg-primary p-2" style="--bs-bg-opacity: .5;">
                                    <p>
                                        <?=$row['Contenido'];?>
                                    </p>
                                </div>
                            
                        </div>
                <?PHP 
                };
                ?>
                <br>

                
                    
                

                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>



            </body>
        </html>