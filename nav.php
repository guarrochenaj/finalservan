<nav class="">
        <a href="index.php"><img src="ed.png" width="125px"></a>
     
        <?PHP
            if($_SESSION['user_perfil'] == '2' || $_SESSION['user_perfil'] == '3'){ ?>
            <a href="administracion.php" class="btn btn-primary float-right mx-1 my-3">Administracion</a>
        <?PHP } ?>
        <a href="perfil.php" class="btn btn-primary float-right mx-1 my-3">Perfil</a>
        <a href="logout.php" class="btn btn-primary float-right mx-1 my-3">Cerrar Sesion</a>
</nav>