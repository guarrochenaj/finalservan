<?php

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


?>