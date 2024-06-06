<?php
session_start();
include "login_check.php";
include "../components/config/config.php";


$notis = $noticias->traerNoticias();
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZonaFutbol</title>
    <?php include "../components/header/links_header.php" ?>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    

 
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

<?php 
            if(isset($_GET['error'])){
                ?>
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading"> <?php echo $_GET['error']?></h4>
                   
                </div>
            <?php
            }
        ?>

    <table id="noticias" class="table table-striped table-responsive">
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Contenido</th>
                <th>Autor</th>
                <th>Fecha</th>
                <th></th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            <?php
                foreach ($notis as $key => $v) {
                    echo "<tr>";
                    echo "<td>" . $v->titulo . "</td>";
                    echo "<td>" . $v->contenido . "</td>";
                    echo "<td>" . $v->autor . "</td>";
                    echo "<td>" . $v->fecha_creacion . "</td>";
                    echo "<td><button type='button' class='btn btn-warning btn-sm edit-btn' data-id=" .$v->noticia_id . ">Editar</button></td>";
                    echo "<td><button type='button' class='btn btn-danger btn-sm delete-btn' data-id=" .$v->noticia_id . ">Eliminar</button></td>";
                    echo "</tr>";
                    
                }

            ?>
        </tbody>
    </table>
</div>
<script src="//cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>


    <script>

        $(document).ready(function() {
            $('#noticias').DataTable();
        });

        $('.edit-btn').on('click', function() {
            let id = $(this).data('id');
            // Redireccionar a la página de edición con el ID como parámetro
            window.location.href = 'editar_noticia_datos.php?id=' + id;
        });

         // Acción de eliminar
         $('.delete-btn').on('click', function() {
                let id = $(this).data('id');
                if (confirm('¿Estás seguro de que quieres eliminar el registro con ID: ' + id + '?')) {
                    fetch('../components/ajax/eliminar_noticia.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        body: 'id=' + id
                    })
                    .then(response => response.text())
                    .then(data => {
                        if (data === 'success') {
                            alert('Noticia eliminada correctamente');
                            location.reload();
                        }else{
                            alert('Error al eliminar la noticia');
                        }
                    })
                }
            });
    </script>
</body>
</html>