<?php
session_start();
include "login_check.php";
include "../components/config/config.php";
$equiposs = $equipos->traerEquipos();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZonaFutbol</title>
    <?php include "../components/header/links_header.php" ?>
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
    <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="mb-4">Calendario</h2>
                <!-- Formulario -->
                <form action="guardar_calendario.php" method="POST">
                    <div class="mb-3">
                        <label for="jornada" class="form-label">Número Jornada</label>
                        <input type="number" name="jornada" class="form-control" id="jornada" placeholder="Ingrese la jornada" min="1" max="42" required>
                    </div>

                    <div class="mb-3">
                        <label for="fecha" class="form-label">Fecha</label>
                        <input type="datetime-local" class="form-control" name="fecha" id="fecha" required>
                    </div>

                    <div class="mb-3">
                        <label for="local" class="form-label">Equipos local</label>
                        <select name="local" class="form-select" id="local" required>
                            <option selected disabled>Equipo</option>
                            <?php
                                foreach ($equiposs as $key => $value) {
                                    echo "<option value='$value->equipo_id'>$value->nombre_equipo</option>";
                                }
                            ?>
                        </select>
                    </div>


                    <div class="mb-3">
                        <label for="visitante" class="form-label">Equipos visitante</label>
                        <select name="visitante" class="form-select" id="visitante">
                            <option selected disabled>Equipo</option>
                            <?php
                                foreach ($equiposs as $key => $value) {
                                    echo "<option value='$value->equipo_id'>$value->nombre_equipo</option>";
                                }
                            ?>
                        </select>
                    </div>


                    <button type="submit" class="btn btn-primary mb-5">Enviar</button>
                </form>
                <!-- Fin del formulario -->
            </div>
        </div>
    </div>
    
</body>
</html>