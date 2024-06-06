<?php
session_start();
include "login_check.php";
include "../components/config/config.php";


var_dump($_POST);
extract($_POST);

//var_dump($_POST);

if(isset($_FILES['archivo']) && !empty($_FILES['archivo'])) {
    $archivo = $_FILES['archivo'];
    var_dump($archivo);
    
    // Verificar que se haya cargado el archivo correctamente
    if($archivo['error'] === UPLOAD_ERR_OK) {
        $nombre_original = $archivo['name'];
        $tipo_archivo = $archivo['type'];
        var_dump($tipo_archivo);
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
    } 
}

if (isset($_POST['portada'])) {
    $portada = true;
}else{
    $portada = false;
}


if (isset($video) && $video == true) {
    $imagen = null;
    $noticias->editarNoticia($noticia_id,$titulo,$enriquecido,$autor,$imagen,$nombre_archivo,$portada);
}elseif(isset($img) && $img == true){
    $vid = null;
    $noticias->editarNoticia($noticia_id,$titulo,$enriquecido,$autor,$nombre_archivo,$vid,$portada);
}else{
    $imagen = null;
    $vid = null;
    $noticias->editarNoticia($noticia_id,$titulo,$enriquecido,$autor,$imagen,$vid,$portada);
}
//$noticias->crearNoticia($titulo,$enriquecido,$nombre_archivo);



?>