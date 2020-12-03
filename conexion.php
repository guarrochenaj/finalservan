<?php
  session_name("SesionesEdibis");
  session_start();

  $dsn="mysql:host=localhost;dbname=edibis";
  $usuario="root";
  $pass="";

  $cnPDO = new PDO($dsn, $usuario, $pass);

 ?>
