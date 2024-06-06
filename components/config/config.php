<?php
/*
require_once "../clases/clase_equipos.php";
require_once "../clases/clase_jugadores.php";
require_once "../clases/clase_noticias.php";
*/

require_once (__DIR__ . "/../clases/clase_jugadores.php");
require_once (__DIR__ . "/../clases/clase_noticias.php");
require_once (__DIR__ . "/../clases/clase_usuarios.php");
require_once (__DIR__ . "/../clases/clase_equipos.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



// Configuración de la conexión a la base de datos
/*
define('DB_HOST', 'localhost'); // Cambiar según la configuración del servidor
define('DB_NAME', 'zonafutbol'); // Cambiar al nombre de la base de datos
define('DB_USER', 'root'); // Cambiar al nombre de usuario de la base de datos
define('DB_PASSWORD', ''); // Cambiar a la contraseña de la base de datos
*/ 
try {
    // Crear la conexión PDO
    $conexion = new PDO("mysql:host=localhost;dbname=zonafutbol","root","");
    
    // Configuración de errores y excepciones de PDO
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Configuración de la codificación de caracteres
    $conexion->exec("SET CHARACTER SET utf8");

    $usuarios = new Usuarios($conexion);
    $noticias = new Noticias($conexion);
    $equipos = new Equipos($conexion);
    $jugadores = new Jugadores($conexion);
} catch (PDOException $e) {
    // Manejo de errores de conexión
    die("Error de conexión a la base de datos: " . $e->getMessage());
}



?>
