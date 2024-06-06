<?php
session_start();
include "login_check.php";
include "../components/config/config.php";
$jornada = $equipos->TraerJornada($_GET['jornada_id']);
$local = $equipos->traerEquipo($jornada->equipo_local);
$visitante = $equipos->traerEquipo($jornada->equipo_visitante);
$juglocal = $jugadores->traerJugadoresEquipo($jornada->equipo_local);
$jugvisit = $jugadores->traerJugadoresEquipo($jornada->equipo_visitante);

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
    <div class="container">

        <form method='post' action='procesar_partido.php' onsubmit='return confirmarEnvio()'>

            <input type="hidden" name="id_local" value="<?php echo $jornada->equipo_local ?>">
            <input type="hidden" name="id_visitante" value="<?php echo $jornada->equipo_visitante ?>">
            <input type="hidden" name="id_jornada" value="<?php echo $jornada->jornada_id ?>">
            <div class='form-group'>
                <label for='local'>Jugadores locales que han jugado</label>
                <select name='jugadores_locales[]' class='form-select' id='local' multiple>
                    <option selected disabled>Jugador</option>
                    <?php foreach ($juglocal as $jlocal) : ?>
                        <option value='<?php echo $jlocal->jugador_id; ?>'><?php echo $jlocal->nombre; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class='form-group'>
                <label for='visitante'>Jugadores visitantes que han jugado</label>
                <select name='jugadores_visitantes[]' class='form-select' id='visitante' multiple>
                    <option selected disabled>Jugador</option>
                    <?php foreach ($jugvisit as $jvisit) : ?>
                        <option value='<?php echo $jvisit->jugador_id; ?>'><?php echo $jvisit->nombre; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class='form-group'>
                <div id="gol_local">
                    <label for='localgol'>Jugadores locales que han marcado</label>
                    <button class="btn btn-dark m-1" type="button" onclick="agregarCampoGL()">Añadir Campo</button>
                    <select name='jugadoresgol_locales[]' class='form-select' id='localgol'>
                        <option selected disabled>Jugador</option>
                        <?php foreach ($juglocal as $jlocal) : ?>
                            <option value='<?php echo $jlocal->jugador_id; ?>'><?php echo $jlocal->nombre; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <input type="number" name="ngoles_local[]" class="form-control m-1">
                </div>
            </div>

            <div class='form-group'>
                <div id="visitantegol">
                    <label for='visitantegol'>Jugadores visitantes que han marcado</label>
                    <button class="btn btn-dark m-1" type="button" onclick="agregarCampoGV()">Añadir Campo</button>
                    <select name='jugadoresgol_visitantes[]' class='form-select' id='visitantegol'>
                        <option selected disabled>Jugador</option>
                        <?php foreach ($jugvisit as $jvisit) : ?>
                            <option value='<?php echo $jvisit->jugador_id; ?>'><?php echo $jvisit->nombre; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <input type="number" name="ngoles_visitante[]" class="form-control m-1">
                </div>
            </div>

            <div class='form-group'>
                <div id="localas">
                    <label for='localas'>Jugadores locales que han asistido</label>
                    <button class="btn btn-dark m-1" type="button" onclick="agregarCampoAL()">Añadir Campo</button>
                    <select name='jugadoresasis_locales[]' class='form-select' id='localas'>
                        <option selected disabled>Jugador</option>
                        <?php foreach ($juglocal as $jlocal) : ?>
                            <option value='<?php echo $jlocal->jugador_id; ?>'><?php echo $jlocal->nombre; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <input type="number" name="nsis_local[]" class="form-control m-1">
                </div>
            </div>

            <div class='form-group'>
                <div id="visitanteas">
                    <label for='visitanteas'>Jugadores visitantes que han asistido</label>
                    <button class="btn btn-dark m-1" type="button" onclick="agregarCampoAV()">Añadir Campo</button>
                    <select name='jugadoresasis_visitantes[]' class='form-select' id='visitanteas'>
                        <option selected disabled>Jugador</option>
                        <?php foreach ($jugvisit as $jvisit) : ?>
                            <option value='<?php echo $jvisit->jugador_id; ?>'><?php echo $jvisit->nombre; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <input type="number" name="nsis_visitante[]" class="form-control m-1">
                </div>
            </div>

            <div class='form-group'>
                <label for='localam'>Jugadores locales tarjetas amarillas</label>
                <select name='jugadoresama_locales[]' class='form-select' id='localam' multiple>
                    <option selected disabled>Jugador</option>
                    <?php foreach ($juglocal as $jlocal) : ?>
                        <option value='<?php echo $jlocal->jugador_id; ?>'><?php echo $jlocal->nombre; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class='form-group'>
                <label for='visitanteam'>Jugadores visitantes tarjetas amarillas</label>
                <select name='jugadoresama_visitantes[]' class='form-select' id='visitanteam' multiple>
                    <option selected disabled>Jugador</option>
                    <?php foreach ($jugvisit as $jvisit) : ?>
                        <option value='<?php echo $jvisit->jugador_id; ?>'><?php echo $jvisit->nombre; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class='form-group'>
                <label for='localroj'>Jugadores locales tarjetas rojas</label>
                <select name='jugadoresroj_locales[]' class='form-select' id='localroj' multiple>
                    <option selected disabled>Jugador</option>
                    <?php foreach ($juglocal as $jlocal) : ?>
                        <option value='<?php echo $jlocal->jugador_id; ?>'><?php echo $jlocal->nombre; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class='form-group'>
                <label for='visitanteroj'>Jugadores visitantes tarjetas rojas</label>
                <select name='jugadoresroj_visitantes[]' class='form-select' id='visitanteroj' multiple>
                    <option selected disabled>Jugador</option>
                    <?php foreach ($jugvisit as $jvisit) : ?>
                        <option value='<?php echo $jvisit->jugador_id; ?>'><?php echo $jvisit->nombre; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class='form-group'>
                <label for='resultadoloc'>Total goles local</label>
                <input type='number' class='form-control' id='resultadoloc' name='resultadoloc' required>
            </div>
            <div class='form-group'>
                <label for='resultadovis'>Total goles visitante</label>
                <input type='number' class='form-control' id='resultadovis' name='resultadovis' required>
            </div>


            <button type='submit' class='btn btn-dark m-3'>Guardar Cambios</button>
        </form>
    </div>


    <script>
        function confirmarEnvio() {
            return confirm("¿Estás seguro de que deseas enviar este formulario?");
        }
    </script>

    <script>
        function agregarCampoGL() {
            let container = document.getElementById('gol_local'); // Usar el ID correcto del contenedor
            let nuevoCampo = document.createElement('div');
            nuevoCampo.classList.add('form-group');
            nuevoCampo.innerHTML = `
            <label for='localgol'>Jugador local que ha marcado</label>
            <select name='jugadoresgol_locales[]' class='form-select' id='localgol'>
                <option selected disabled>Jugador</option>
                <?php foreach ($juglocal as $jlocal) : ?>
                    <option value='<?php echo $jlocal->jugador_id; ?>'><?php echo $jlocal->nombre; ?></option>
                <?php endforeach; ?>
            </select>
            <input type="number" name="ngoles_local[]" class="form-control m-1">
        `;
            container.appendChild(nuevoCampo);
        }

        function agregarCampoGV() {
            let container = document.getElementById('visitantegol');
            let nuevoCampo = document.createElement('div');
            nuevoCampo.classList.add('form-group');
            nuevoCampo.innerHTML = `
            <label for='visitantegol'>Jugador visitante que ha marcado</label>
            <select name='jugadoresgol_visitantes[]' class='form-select' id='visitantegol'>
                <option selected disabled>Jugador</option>
                <?php foreach ($jugvisit as $jvisit) : ?>
                    <option value='<?php echo $jvisit->jugador_id; ?>'><?php echo $jvisit->nombre; ?></option>
                <?php endforeach; ?>
            </select>
            <input type="number" name="ngoles_visitante[]" class="form-control m-1">
        `;
            container.appendChild(nuevoCampo);
        }

        function agregarCampoAL() {
            let container = document.getElementById('localas');
            let nuevoCampo = document.createElement('div');
            nuevoCampo.classList.add('form-group');
            nuevoCampo.innerHTML = `
            <label for='localas'>Jugador local que ha asistido</label>
            <select name='jugadoresasis_locales[]' class='form-select' id='localas'>
                <option selected disabled>Jugador</option>
                <?php foreach ($juglocal as $jlocal) : ?>
                    <option value='<?php echo $jlocal->jugador_id; ?>'><?php echo $jlocal->nombre; ?></option>
                <?php endforeach; ?>
            </select>
            <input type="number" name="nsis_local[]" class="form-control m-1">
        `;
            container.appendChild(nuevoCampo);
        }

        function agregarCampoAV() {
            let container = document.getElementById('visitanteas');
            let nuevoCampo = document.createElement('div');
            nuevoCampo.classList.add('form-group');
            nuevoCampo.innerHTML = `
            <label for='visitanteas'>Jugador visitante que ha asistido</label>
            <select name='jugadoresasis_visitantes[]' class='form-select' id='visitanteas'>
                <option selected disabled>Jugador</option>
                <?php foreach ($jugvisit as $jvisit) : ?>
                    <option value='<?php echo $jvisit->jugador_id; ?>'><?php echo $jvisit->nombre; ?></option>
                <?php endforeach; ?>
            </select>
            <input type="number" name="nsis_visitante[]" class="form-control m-1">
        `;
            container.appendChild(nuevoCampo);
        }
    </script>






</body>

</html>