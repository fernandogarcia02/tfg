<?php
// Iniciar sesión si no está iniciada
session_start();

// Destruir todas las variables de sesión
$_SESSION = array();


//se destruye la sesión
session_destroy();

// Redireccionar a una página de inicio de sesión u otra página después del logout
header("location: index.php");
exit;
?>
