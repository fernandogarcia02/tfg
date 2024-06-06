<?php
session_start();
include "login_check.php";
include "../components/config/config.php";



extract($_POST);

if(isset($_FILES['archivo']) && !empty($_FILES['archivo'])) {
    $archivo = $_FILES['archivo'];

    
    // Verificar que se haya cargado el archivo correctamente
    if($archivo['error'] === UPLOAD_ERR_OK) {
        $nombre_original = $archivo['name'];
        $tipo_archivo = $archivo['type'];
        $tamano_archivo = $archivo['size'];
        $archivo_temporal = $archivo['tmp_name'];
        $extension = pathinfo($nombre_original, PATHINFO_EXTENSION); 
        $nombre_archivo = uniqid() . '-' . $nombre_original;

        // Mover el archivo a una ubicación permanente
        move_uploaded_file($archivo_temporal, '../archivos/jugadores/' . $nombre_archivo);

    } 
}

$jugadores->editar_jugador($jugador_id,$equipo,$nombre,$posicion,$camiseta,$fecha,$nacionalidad,$altura,$peso,$goles,$asistencias,$partidos,$amarillas,$rojas,$nombre_archivo,$descripcion);

