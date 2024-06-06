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
                <h2 class="mb-4">Crear Jugador</h2>
                <!-- Formulario -->
                <form action="guardar_jugador.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Ingrese el nombre del jugador" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="equipo" class="form-label">Equipo</label>
                        <select name="equipo" class="form-select" id="equipo" required>
                            <option selected disabled>Equipo</option>
                            <?php
                                foreach ($equiposs as $key => $value) {
                                    echo "<option value='$value->equipo_id'>$value->nombre_equipo</option>";
                                }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="posicion" class="form-label">Posición</label>
                        <select class="form-select" name="posicion" id="posicion" required>
                            <option selected disabled>Posición</option>
                            <option value="por">POR</option>
                            <option value="ld">LD</option>
                            <option value="dfc">DFC</option>
                            <option value="li">LI</option>
                            <option value="cad">CAD</option>
                            <option value="cai">CAI</option>
                            <option value="mcd">MCD</option>
                            <option value="mc">MC</option>
                            <option value="md">MD</option>
                            <option value="mi">MI</option>
                            <option value="mco">MCO</option>
                            <option value="sd">SD</option>
                            <option value="ei">EI</option>
                            <option value="ed">ED</option>
                            <option value="dc">DC</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="camiseta" class="form-label">Número Camiseta</label>
                        <input type="text" class="form-control" name="camiseta" id="camiseta" placeholder="Ingrese la camiseta" required>
                    </div>

                    <div class="mb-3">
                        <label for="fecha" class="form-label">Fecha de nacimiento</label>
                        <input type="date" class="form-control" name="fecha" id="fecha" required>
                    </div>

                    <div class="mb-3">
                        <label for="nacionalidad" class="form-label">Nacionalidad</label>
                        <input type="text" class="form-control" name="nacionalidad" id="nacionalidad" placeholder="Ingrese la nacionalidad" required>
                    </div>

                    <div class="mb-3">
                        <label for="altura" class="form-label">Altura</label>
                        <input type="number" class="form-control" name="altura" id="altura" placeholder="Ingrese la altura" required>
                    </div>

                    <div class="mb-3">
                        <label for="peso" class="form-label">Peso</label>
                        <input type="number" class="form-control" name="peso" id="peso" placeholder="Ingrese el peso" required>
                    </div>

                    <div class="mb-3">
                        <label for="goles" class="form-label">Goles</label>
                        <input type="number" class="form-control" name="goles" id="goles" placeholder="Ingrese los goles" required>
                    </div>

                    <div class="mb-3">
                        <label for="asistencias" class="form-label">Asistencias</label>
                        <input type="number" class="form-control" name="asistencias" id="aistencias" placeholder="Ingrese las asistencias" required>
                    </div>

                    <div class="mb-3">
                        <label for="partidos" class="form-label">Partidos Jugados</label>
                        <input type="number" class="form-control" name="partidos" id="partidos" placeholder="Ingrese los partidos jugados" required>
                    </div>

                    <div class="mb-3">
                        <label for="amarillas" class="form-label">Tarjetas Amarillas</label>
                        <input type="number" class="form-control" name="amarillas" id="amarillas" placeholder="Ingrese las tarjetas amarillas" required>
                    </div>

                    <div class="mb-3">
                        <label for="rojas" class="form-label">Tarjetas Rojas</label>
                        <input type="text" class="form-control" name="rojas" id="rojas" placeholder="Ingrese las tarjetas rojas" required>
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