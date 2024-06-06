<?php
session_start();
include "../components/config/config.php";
$noti = $noticias->obtenerNoticia($_GET['noticia_id']);



// Verifica si el formulario de comentario fue enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['usuario_id'])) {
    $comentario = $_POST['comentario'];
    $usuario_id = $_SESSION['usuario_id'];

    $noticias->crearComentario($usuario_id,$comentario,$_GET['noticia_id']);
    
}

$comentarios = $noticias->traerComentarios($_GET['noticia_id']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZonaFutbol</title>
    <?php include "../components/header/links_header.php" ?>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/noticia.css">
</head>
<body>
    <?php include "../components/header/navbar2_2.php" ?>
    <div class="container">
        <div class="noticia">
            <h1 class="h1"><?php echo $noti['titulo'] ?></h1>
            <img src="../archivos/<?php echo $noti['imagen_url'] ?>" alt="">
            <div class="autor">
                <p><?php echo $noti['autor'] ?></p>
            </div>
            <div class="noticia-contenido ql-editor">
                <p><?php echo $noti['contenido'] ?></p>
            </div>
        </div>



        <div class="comentarios">
            <h2>Comentarios</h2>
            <div class="lista-comentarios mt-4">
                <?php foreach ($comentarios as $comentario): 
                $username = $usuarios->traerUsuario($comentario->usuario_id);
                    ?>
                    <div class="comentario mb-3">
                        <h5><?php echo $username->nombre_usuario; ?></h5>
                        <p><?php echo $comentario->contenido; ?></p>
                        <small class="text-muted"><?php echo $comentario->fecha_publicacion; ?></small>
                    </div>
                <?php endforeach; ?>
            </div>

            <?php if (isset($_SESSION['usuario_id'])): ?>
                <form method="post">
                    <div class="form-group">
                        <label for="comentario">Deja tu comentario:</label>
                        <textarea class="form-control" id="comentario" name="comentario" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-custom mt-3">Enviar</button>
                </form>
            <?php else: ?>
                <p><a href="../inicio_sesion.php">Inicia sesión</a> para dejar un comentario.</p>
            <?php endif; ?>

        </div>
    


    </div>


  

    



    <?php include "../components/header/footer.php" ?>

</body>
</html>