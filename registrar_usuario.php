<?php
// Incluir el archivo de conexión a la base de datos
require "components/config/config.php";
// Verificar si se ha enviado el formulario de registro
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];
    $fecha_nacimiento = $_POST["nacimiento"];
    $username = $_POST["username"];

    if ($_POST['contrasena'] != $_POST['confirmar_contrasena']) {
        header("Location: registrarse.php?error=Las+contraseñas+no+coinciden");
        exit;
    }

    // Encriptar la contraseña antes de guardarla en la base de datos
    $hash_contrasena = password_hash($contrasena, PASSWORD_DEFAULT);

    $usuarios->registrarUsuario($nombre,$correo,$hash_contrasena,$fecha_nacimiento,$username);
    
}
?>
