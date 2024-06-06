<?php
session_start();
include "login_check.php";
include "../components/config/config.php";


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZonaFutbol</title>
    <?php include "../components/header/links_header.php" ?>
    <link rel="stylesheet" href="../css/ver_calendario.css">
</head>

<body>
    <?php include "../components/header/navbar.php";



    $asa = $equipos->traerCalendario();
    //$asa = $equipos->traerEscudo("2");
    //   echo "<pre>";
    //   var_dump($asa);
    //   echo "</pre>";
    ?>

    <?php
    if (isset($_GET['error'])) {
    ?>
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading"> <?php echo $_GET['error'] ?></h4>

        </div>
    <?php
    }
    ?>
    <div class="container">
        <?php
        for ($i = 1; $i <= 42; $i++) {
            echo "<table class='table table-responsive'>";
            echo "<caption>Jornada " . $i . "</caption>";



            if (!isset($asa[$i])) {
                continue; // Si la jornada no existe, saltar a la siguiente iteración
            }

            foreach ($asa[$i] as $key => $value) {
                $local = $equipos->traerEquipo($value->equipo_local);
                $visitante = $equipos->traerEquipo($value->equipo_visitante);
                $resultado = $equipos->traerResultado($value->jornada_id);
                $juglocal = $jugadores->traerJugadoresEquipo($value->equipo_local);
                $jugvisit = $jugadores->traerJugadoresEquipo($value->equipo_visitante);
                $modalId = "modal" . $i . "_" . $key; // Crear un ID único para cada modal
                // Modal específico para cada partido
        ?>
                
        <?php
                echo "<tr>";
                echo "<td>";
                echo "<figure>";
                echo "<img width='30px' height='30px' src='../archivos/escudos/" . $local['escudo_url'] . "'>";
                echo "</figure>";

                echo "<span>" . $local['nombre_equipo'] . "</span>";
                echo "</td>";

                echo "<td>";
                echo "<span>";
                if ($resultado) {
                    echo $resultado['goles_local'] . " - " . $resultado['goles_visitante'];
                } else {
                    ?>
                    <a href="poner_resultado.php?jornada_id=<?php echo $value->jornada_id ?>"><button class="btn btn-dark">Poner Resultado</button></a>
                    <?php
                }
                echo "</span>";
                echo "</td>";

                echo "<td>";
                echo "<figure>";
                echo "<img width='30px' height='30px' src='../archivos/escudos/" . $visitante['escudo_url'] . "'>";
                echo "</figure>";

                echo "<span>" . $visitante['nombre_equipo'] . "</span>";
                echo "</td>";


                echo "</tr>";
            }



            echo "</table>";
        }

        ?>
    </div>

    <script>
        function confirmarEnvio() {
            return confirm("¿Estás seguro de que deseas enviar este formulario?");
        }
    </script>

<script>
    function agregarCampo() {

        console.log("asaaa");
        let container = document.getElementById('gol_local'); // Obtener el contenedor donde se agregarán los campos
        let nuevoCampo = document.createElement('div'); // Crear un nuevo div para el campo
        nuevoCampo.classList.add('form-group'); // Añadir la clase 'form-group' al nuevo div
        nuevoCampo.innerHTML = `
            <label for='localgol_<?php echo $modalId; ?>'>Jugador local que ha marcado</label>
            <select name='jugadoresgol_locales[]' class='form-select' id='localgol_<?php echo $modalId; ?>'>
                <option selected disabled>Jugador</option>
                <?php foreach ($juglocal as $jlocal) : ?>
                    <option value='<?php echo $jlocal->jugador_id; ?>'><?php echo $jlocal->nombre; ?></option>
                <?php endforeach; ?>
            </select>
            <input type="number" name="ngoles_local[]" class="form-control m-1">
        `; // Establecer el contenido HTML del nuevo campo
        container.appendChild(nuevoCampo); // Agregar el nuevo campo al contenedor
    }
</script>


    <script>
        // Obtener el modal y el formulario
        let modal = document.getElementById('myModal');
        let modalTitle = modal.querySelector('.modal-title');
        let modalLocal = document.getElementById('local');
        let modalVisitante = document.getElementById('visitante');
        let modalFecha = document.getElementById('fecha');
        let modalResultado = document.getElementById('resultado');

        // Añadir evento click a todos los botones
        let btns = document.querySelectorAll('.btn[data-toggle="modal"]');
        btns.forEach(function(btn) {
            btn.addEventListener('click', function() {
                var local = btn.getAttribute('data-local');
                var visitante = btn.getAttribute('data-visitante');
                var fecha = btn.getAttribute('data-fecha');
                var resultado = btn.getAttribute('data-resultado');

                modalTitle.innerText = 'Detalles del Partido';
                modalLocal.value = local;
                modalVisitante.value = visitante;
                modalFecha.value = fecha;
                modalResultado.value = resultado;
            });
        });
    </script>
</body>

</html>