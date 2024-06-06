<?php
session_start();
include "login_check.php";
include "../components/config/config.php";


$equiposs = $equipos->traerEquipos();

$jugador = $jugadores->traerJugador($_GET['id']);


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
                <h2 class="mb-4">Editar Jugador</h2>
                <!-- Formulario -->
                <form action="guardar_jugador_editado.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="jugador_id" value="<?php echo $_GET['id'] ?>">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Ingrese el nombre del jugador" value="<?php echo !empty($jugador->nombre) ? $jugador->nombre : '' ?>" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="equipo" class="form-label">Equipo</label>
                        <select name="equipo" class="form-select" id="equipo" required>
                            <option selected disabled>Equipo</option>
                            <?php
                                foreach ($equiposs as $key => $value) {
                                    echo "<option value='$value->equipo_id' " . ($jugador->equipo_id == $value->equipo_id ? "selected" : "") . ">$value->nombre_equipo</option>";

                                }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="posicion" class="form-label">Posición</label>
                        <select class="form-select" name="posicion" id="posicion" required>
                            <option selected disabled>Posición</option>
                            <option value="por" <?php echo $jugador->posicion == 'por' ? "selected" : "" ?>>POR</option>
                            <option value="ld" <?php echo $jugador->posicion == 'ld' ? "selected" : "" ?>>LD</option>
                            <option value="dfc" <?php echo $jugador->posicion == 'dfc' ? "selected" : "" ?>>DFC</option>
                            <option value="li" <?php echo $jugador->posicion == 'li' ? "selected" : "" ?>>LI</option>
                            <option value="cad" <?php echo $jugador->posicion == 'cad' ? "selected" : "" ?>>CAD</option>
                            <option value="cai" <?php echo $jugador->posicion == 'cai' ? "selected" : "" ?>>CAI</option>
                            <option value="mcd" <?php echo $jugador->posicion == 'mcd' ? "selected" : "" ?>>MCD</option>
                            <option value="mc" <?php echo $jugador->posicion == 'mc' ? "selected" : "" ?>>MC</option>
                            <option value="md" <?php echo $jugador->posicion == 'md' ? "selected" : "" ?>>MD</option>
                            <option value="mi" <?php echo $jugador->posicion == 'mi' ? "selected" : "" ?>>MI</option>
                            <option value="mco" <?php echo $jugador->posicion == 'mco' ? "selected" : "" ?>>MCO</option>
                            <option value="sd" <?php echo $jugador->posicion == 'sd' ? "selected" : "" ?>>SD</option>
                            <option value="ei" <?php echo $jugador->posicion == 'ei' ? "selected" : "" ?>>EI</option>
                            <option value="ed" <?php echo $jugador->posicion == 'ed' ? "selected" : "" ?>>ED</option>
                            <option value="dc" <?php echo $jugador->posicion == 'dc' ? "selected" : "" ?>>DC</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="camiseta" class="form-label">Número Camiseta</label>
                        <input type="text" class="form-control" name="camiseta" id="camiseta" placeholder="Ingrese la camiseta" value="<?php echo !empty($jugador->numero_camiseta) ? $jugador->numero_camiseta : '' ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="fecha" class="form-label">Fecha de nacimiento</label>
                        <input type="date" class="form-control" name="fecha" id="fecha" value="<?php echo !empty($jugador->fecha_nacimiento) ? $jugador->fecha_nacimiento : '' ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="nacionalidad" class="form-label">Nacionalidad</label>
                        <input type="text" class="form-control" name="nacionalidad" id="nacionalidad" placeholder="Ingrese la nacionalidad" value="<?php echo !empty($jugador->nacionalidad) ? $jugador->nacionalidad : '' ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="altura" class="form-label">Altura</label>
                        <input type="number" class="form-control" name="altura" id="altura" placeholder="Ingrese la altura" value="<?php echo !empty($jugador->altura) ? $jugador->altura : '' ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="peso" class="form-label">Peso</label>
                        <input type="number" class="form-control" name="peso" id="peso" placeholder="Ingrese el peso" value="<?php echo !empty($jugador->peso) ? $jugador->peso : '' ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="goles" class="form-label">Goles</label>
                        <input type="number" class="form-control" name="goles" id="goles" placeholder="Ingrese los goles" required>
                    </div>

                    <div class="mb-3">
                        <label for="asistencias" class="form-label">Asistencias</label>
                        <input type="number" class="form-control" name="asistencias" id="aistencias" placeholder="Ingrese las asistencias" value="<?php echo !empty($jugador->goles) ? $jugador->goles : '' ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="partidos" class="form-label">Partidos Jugados</label>
                        <input type="number" class="form-control" name="partidos" id="partidos" placeholder="Ingrese los partidos jugados" value="<?php echo !empty($jugador->partidos_jugados) ? $jugador->partidos_jugados : '' ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="amarillas" class="form-label">Tarjetas Amarillas</label>
                        <input type="number" class="form-control" name="amarillas" id="amarillas" placeholder="Ingrese las tarjetas amarillas" value="<?php echo !empty($jugador->tarjetas_amarillas) ? $jugador->tarjetas_amarillas : '' ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="rojas" class="form-label">Tarjetas Rojas</label>
                        <input type="text" class="form-control" name="rojas" id="rojas" placeholder="Ingrese las tarjetas rojas" value="<?php echo !empty($jugador->tarjetas_rojas) ? $jugador->tarjetas_rojas : '' ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea name="descripcion" class="form-control" id="descripcion" rows="10" cols="50" required></textarea>
                    </div>


                    <div class="mb-3">
                        <label for="archivo" class="form-label">Foto</label>
                        <input type="file" class="form-control" name="archivo" id="archivo" accept="image/*" >
                    </div>

                    <button type="submit" class="btn btn-primary mb-5">Enviar</button>
                </form>
                <!-- Fin del formulario -->
            </div>
        </div>
    </div>
    
   
</body>
</html>