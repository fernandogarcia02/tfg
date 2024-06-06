<?php
session_start();
include "../components/config/config.php";
$jugador = $jugadores->traerJugador($_GET['jugador_id']);

$fnac = new DateTime($jugador->fecha_nacimiento);
$fac = new DateTime('today');

$diferencia = $fac->diff($fnac);
$edad = $diferencia->y;

$equipo = $equipos->traerEquipo($jugador->equipo_id);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZonaFutbol</title>
    <?php include "../components/header/links_header.php" ?>
    <style>
        .card-img-top {
            max-width: 100%;
            max-height: 200px;
            /* Ajustar esta altura según sea necesario */
            object-fit: contain;
            /* Mantener el aspecto de la imagen */
        }

        .mini-nav .nav-link {
            margin: 0 15px;
        }

        .mini-nav {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .mini-nav li {
            width: 140px;
        }

        .mini-nav .nav-link.active {
            background-color: #28a745;
            /* Color de fondo del enlace activo */
            border-color: #28a745;
            color: #fff;
            /* Color del texto del enlace activo */
        }

        .mini-nav .nav-link {
            background-color: #fff;
            /* Color de fondo de los enlaces */
            color: #28a745;
            /* Color del texto de los enlaces */
            border: 1px solid #28a745;
            /* Borde de los enlaces */
        }

        .mini-nav .nav-link:hover {
            background-color: #28a745;
            color: #fff;
            /* Color de fondo al pasar el mouse */
        }
    </style>


</head>

<body>
    <?php include "../components/header/navbar2_2.php" ?>



    <div class="container mt-4">
        <div class="mini-nav">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link active" href="jugador.php?jugador_id=<?php echo $_GET['jugador_id'] ?>">Ficha</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="noticias_jugador.php?jugador_id=<?php echo $_GET['jugador_id'] ?>">Noticias</a>
                </li>

            </ul>
        </div>
        <div class="card mb-4">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="../img/default.svg" class="card-img-top" alt="Foto">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo mb_strtoupper(htmlspecialchars($jugador->nombre)); ?></h5>
                        <p class="card-text"><strong>Edad:</strong> <?php echo htmlspecialchars($edad); ?></p>
                        <p class="card-text"><strong>Equipo:</strong> <?php echo mb_strtoupper(htmlspecialchars($equipo['nombre_equipo'])); ?></p>
                        <p class="card-text"><strong>Posición:</strong> <?php echo strtoupper(htmlspecialchars($jugador->posicion)); ?></p>
                        <p class="card-text"><strong>Número:</strong> <?php echo htmlspecialchars($jugador->numero_camiseta); ?></p>
                        <p class="card-text"><strong>Nacionalidad:</strong> <?php echo htmlspecialchars($jugador->nacionalidad); ?></p>
                        <p class="card-text"><strong>Altura:</strong> <?php echo htmlspecialchars($jugador->nacionalidad); ?></p>
                        <p class="card-text"><strong>Peso:</strong> <?php echo htmlspecialchars($jugador->nacionalidad); ?></p>
                        <!-- Añadir más información del jugador si es necesario -->
                    </div>
                </div>
            </div>
        </div>


        <!-- Card de estadísticas -->
        <div class="card mt-3 mb-4">
            <div class="card-body">
                <h5 class="card-title">Estadísticas del Jugador</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Partidos Jugados:</strong> <?php echo htmlspecialchars($jugador->partidos_jugados); ?></li>
                    <li class="list-group-item"><strong>Goles:</strong> <?php echo htmlspecialchars($jugador->goles); ?></li>
                    <li class="list-group-item"><strong>Asistencias:</strong> <?php echo htmlspecialchars($jugador->asistencias); ?></li>
                    <li class="list-group-item"><strong>Tarjetas Amarillas:</strong> <?php echo htmlspecialchars($jugador->tarjetas_amarillas); ?></li>
                    <li class="list-group-item"><strong>Tarjetas Rojas:</strong> <?php echo htmlspecialchars($jugador->tarjetas_rojas); ?></li>
                    <!-- Añadir más estadísticas si es necesario -->
                </ul>
            </div>
        </div>
    </div>

    <?php include "../components/header/footer.php"; ?>

</body>

</html>