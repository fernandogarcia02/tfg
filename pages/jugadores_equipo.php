<?php
session_start();
include "../components/config/config.php";

$equi = $equipos->traerEquipo($_GET['equipo_id']);
$juga = $jugadores->traerJugadoresEquipo($_GET['equipo_id']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZonaFutbol</title>
    <?php include "../components/header/links_header.php" ?>
    <link rel="stylesheet" href="../css/noticias_equipo.css">
    <style>
        .linea-separadora {
            border-bottom: 2px solid #000;
            margin: 20px 0;
        }
        .jugador {
            display: flex;
            align-items: center;
            margin: 10px 0;
        }
        .jugador img {
            width: 50px;
            height: 50px;
            margin-right: 15px;
            object-fit: cover;
            border-radius: 50%;
        }
        a{
            text-decoration: none;
        }
    </style>
</head>

<body>
    <?php include "../components/header/navbar2_2.php" ?>

    <div class="container">
        <div class="mini-nav">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link" href="equipo.php?equipo_id=<?php echo $_GET['equipo_id'] ?>">Ficha</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="noticias_equipo.php?equipo_id=<?php echo $_GET['equipo_id'] ?>">Noticias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="jugadores_equipo.php?equipo_id=<?php echo $_GET['equipo_id'] ?>">Jugadores</a>
                </li>
            </ul>
        </div>

        <div class="container">
            <h1>Porteros</h1>
            <div class="linea-separadora"></div>
            <?php
            foreach ($juga as $key => $value) {
                if ($value->posicion == 'por') {
                    echo "<div class='jugador'>";
                    echo "<img src='../img/default.svg'>";
                    echo "<div>";
                    ?>
                    <p><a href="jugador.php?jugador_id=<?php echo $value->jugador_id ?>"><?php echo $value->nombre?></a> <?php echo "#" . $value->numero_camiseta ?></p>
                    <?php
                    echo "<p>" . $value->nacionalidad . "</p>";
                    echo "<p>" . strtoupper($value->posicion) . "</p>";
                    echo "</div>";
                    echo "</div>";
                }
            }
            ?>
        </div>

        <div class="container">
            <h1>Defensas</h1>
            <div class="linea-separadora"></div>
            <?php
            foreach ($juga as $key => $value) {
                if ($value->posicion == 'li' || $value->posicion == 'ld' || $value->posicion == 'dfc' || $value->posicion == 'cad' || $value->posicion == 'cai') {
                    echo "<div class='jugador'>";
                    echo "<img src='../img/default.svg'>";
                    echo "<div>";
                    ?>
                    <p><a href="jugador.php?jugador_id=<?php echo $value->jugador_id ?>"><?php echo $value->nombre?></a> <?php echo "#" . $value->numero_camiseta ?></p>
                    <?php
                    echo "<p>" . $value->nacionalidad . "</p>";
                    echo "<p>" . strtoupper($value->posicion) . "</p>";
                    echo "</div>";
                    echo "</div>";
                }
            }
            ?>
        </div>

        <div class="container">
            <h1>Centrocampistas</h1>
            <div class="linea-separadora"></div>
            <?php
            foreach ($juga as $key => $value) {
                if ($value->posicion == 'mcd' || $value->posicion == 'mc' || $value->posicion == 'md' || $value->posicion == 'mi' || $value->posicion == 'mco') {
                    echo "<div class='jugador'>";
                    echo "<img src='../img/default.svg'>";
                    echo "<div>";
                    ?>
                    <p><a href="jugador.php?jugador_id=<?php echo $value->jugador_id ?>"><?php echo $value->nombre?></a> <?php echo "#" . $value->numero_camiseta ?></p>
                    <?php
                    echo "<p>" . $value->nacionalidad . "</p>";
                    echo "<p>" . strtoupper($value->posicion) . "</p>";
                    echo "</div>";
                    echo "</div>";
                }
            }
            ?>
        </div>

        <div class="container">
            <h1>Delanteros</h1>
            <div class="linea-separadora"></div>
            <?php
            foreach ($juga as $key => $value) {
                if ($value->posicion == 'sd' || $value->posicion == 'dc' || $value->posicion == 'ei' || $value->posicion == 'ed') {
                    echo "<div class='jugador'>";
                    echo "<img src='../img/default.svg'>";
                    echo "<div>";
                    ?>
                    <p><a href="jugador.php?jugador_id=<?php echo $value->jugador_id ?>"><?php echo $value->nombre?></a> <?php echo "#" . $value->numero_camiseta ?></p>
                    <?php
                    echo "<p>" . $value->nacionalidad . "</p>";
                    echo "<p>" . strtoupper($value->posicion) . "</p>";
                    echo "</div>";
                    echo "</div>";
                }
            }
            ?>
        </div>


        <?php include "../components/header/footer.php" ?>

      
</body>

</html>