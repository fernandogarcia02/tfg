<?php
session_start();
include "login_check.php";
include "../components/config/config.php";


$jugas = $jugadores->traerJugadores();
 
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

    <table id="jugadores" class="table table-striped table-responsive">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Posicion</th>
                <th>Numero</th>
                <th>Nacimiento</th>
                <th>Nacionalidad</th>
                <th></th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            <?php
                foreach ($jugas as $key => $v) {
                    echo "<tr>";
                    echo "<td>" . $v->nombre . "</td>";
                    echo "<td>" . strtoupper($v->posicion) . "</td>";
                    echo "<td>" . $v->numero_camiseta . "</td>";
                    echo "<td>" . $v->fecha_nacimiento . "</td>";
                    echo "<td>" . $v->nacionalidad . "</td>";
                    echo "<td><button type='button' class='btn btn-warning btn-sm edit-btn' data-id=" .$v->jugador_id . ">Editar</button></td>";
                    echo "<td><button type='button' class='btn btn-danger btn-sm delete-btn' data-id=" .$v->jugador_id . ">Eliminar</button></td>";
                    echo "</tr>";
                    
                }

            ?>
        </tbody>
    </table>
</div>
<script src="//cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>


    <script>

        $(document).ready(function() {
            $('#jugadores').DataTable();
        });

        $('.edit-btn').on('click', function() {
            let id = $(this).data('id');
            // Redireccionar a la página de edición con el ID como parámetro
            window.location.href = 'editar_jugador_datos.php?id=' + id;
        });

         // Acción de eliminar
         $('.delete-btn').on('click', function() {
                let id = $(this).data('id');
                if (confirm('¿Estás seguro de que quieres eliminar el registro con ID: ' + id + '?')) {
                    fetch('../components/ajax/eliminar_jugador.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        body: 'id=' + id
                    })
                    .then(response => response.text())
                    .then(data => {
                        if (data === 'success') {
                            alert('Jugador eliminado correctamente');
                            location.reload();
                        }else{
                            alert('Error al eliminar el jugador');
                        }
                    })
                }
            });
    </script>
</body>
</html>