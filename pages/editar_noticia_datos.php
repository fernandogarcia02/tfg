<?php
session_start();
include "login_check.php";
include "../components/config/config.php";


$equiposs = $equipos->traerEquipos();
$jugadoress = $jugadores->traerJugadores();
$noti = $noticias->obtenerNoticia($_GET['id']);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZonaFutbol</title>
    <?php include "../components/header/links_header.php" ?>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
</head>
<body>
    <?php include "../components/header/navbar.php" ?>
    
    <div class="container mt-5">
        <?php 
            if(isset($_GET['mensaje'])){
                ?>
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading"> <?php echo $_GET['mensaje']?></h4>
                   
                </div>
            <?php
            }
        ?>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="mb-4">Editar Noticia</h2>
                <!-- Formulario -->
                <form action="guardar_noticia_editada.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título</label>
                        <input type="text" name="titulo" class="form-control" id="titulo" placeholder="Ingrese el titulo" value="<?php echo !empty($noti['titulo']) ? $noti['titulo'] : '' ?>" required>
                    </div>

                    <label for="contenido" class="form-label">Contenido</label>

                    <div class="mb-3" id="contenido">
                        <p></p>
                    </div>
                    <input type="hidden" id="enriquecido" name="enriquecido" >                    
                    <div class="mb-3">
                        <label for="autor" class="form-label">Autor</label>
                        <input type="text" class="form-control" name="autor" id="autor" placeholder="Ingrese el autor" value="<?php echo !empty($noti['autor']) ? $noti['autor'] : '' ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="archivo" class="form-label">Selecciona una imagen:</label>
                        <input type="file" class="form-control" name="archivo" id="archivo" accept="image/*">
                    </div>

                    <div class="mb-3">
                        <label for="portada" class="form-check-label">Portada</label>
                        <input type="checkbox" class="form-check-input" name="portada" id="portada">
                    </div>
                    <input type="hidden" name="noticia_id" value="<?php echo $_GET['id'] ?>">
                    <button type="submit" class="btn btn-primary mb-5">Enviar</button>
                </form>
                <!-- Fin del formulario -->
            </div>
        </div>
    </div>
    
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
  <script>

let toolbarOptions = [
      ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
      ['blockquote', 'code-block'],
    
      [{ 'header': 1 }, { 'header': 2 }],               // custom button values
      [{ 'list': 'ordered'}, { 'list': 'bullet' }],
      [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
      [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
      [{ 'direction': 'rtl' }],                         // text direction
    
      [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
      [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
    
      [{ 'color': [] }],          // include color option
      [{ 'background': [] }],     // include background color option
    
      [{ 'font': [] }],
      [{ 'align': [] }],
    
      ['clean']                                         // remove formatting button
    ];
    let quill = new Quill('#contenido', {
      theme: 'snow',
      modules: {
        toolbar: toolbarOptions
      }
    });

    quill.on('text-change', function(delta, oldDelta, source) {
      // Actualizar el contenido del textarea oculto
      document.getElementById('enriquecido').value = quill.root.innerHTML;
    });

    let texto = `<?php echo $noti['contenido'] ?>`;
    quill.clipboard.dangerouslyPasteHTML(texto);
  </script>

</body>
</html>