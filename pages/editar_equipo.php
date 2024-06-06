<?php
session_start();
include "login_check.php";
include "../components/config/config.php";


$equi = $equipos->traerEquipos();
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZonaFutbol</title>
    <?php include "../components/header/links_header.php" ?>
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

    <table id="equipos" class="table table-striped table-responsive">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Fundacion</th>
                <th>Entrenador</th>
                <th>Estadio</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            <?php
                foreach ($equi as $key => $v) {
                    echo "<tr>";
                    echo "<td>" . $v->nombre_equipo . "</td>";
                    echo "<td>" . $v->descripcion . "</td>";
                    echo "<td>" . $v->fecha_fundacion . "</td>";
                    echo "<td>" . $v->entrenador_principal . "</td>";
                    echo "<td>" . $v->estadio_principal . "</td>";
                    echo "<td><button type='button' class='btn btn-warning btn-sm edit-btn' data-id=" .$v->equipo_id . ">Editar</button></td>";
                    echo "</tr>";
                    
                }

            ?>
        </tbody>
    </table>
</div>
<script src="//cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>


    <script>

        $(document).ready(function() {
            $('#equipos').DataTable();
        });

        $('.edit-btn').on('click', function() {
            let id = $(this).data('id');
            // Redireccionar a la página de edición con el ID como parámetro
            window.location.href = 'editar_equipo_datos.php?id=' + id;
        });

    </script>
</body>
</html>