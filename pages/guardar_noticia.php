<?php
session_start();
include "login_check.php";
include "../components/config/config.php";


//var_dump($_POST);
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
        move_uploaded_file($archivo_temporal, '../archivos/' . $nombre_archivo);

        if(strpos($tipo_archivo, "video/") === 0 ){
            $video = true;
        }else{
            $img=true;
        }
    } else {
        header("location:crear_noticia.php?error=Error+al+subir+el+archivo");
        exit;
    }
}

if (isset($_POST['portada'])) {
    $portada = true;
}else{
    $portada = false;
}


if (isset($video) && $video == true) {
    $imagen = null;
    $noticias->crearNoticia($titulo,$enriquecido,$imagen,$nombre_archivo,$autor,$opcionese,$opcionesj,$portada);
}elseif(isset($img) && $img == true){
    $vid = null;
    $noticias->crearNoticia($titulo,$enriquecido,$nombre_archivo,$vid,$autor,$opcionese,$opcionesj,$portada);
}else{
    $imagen = null;
    $vid = null;
    $noticias->crearNoticia($titulo,$enriquecido,$imagen,$vid,$autor,$opcionese,$opcionesj,$portada);
}
//$noticias->crearNoticia($titulo,$enriquecido,$nombre_archivo);



?>