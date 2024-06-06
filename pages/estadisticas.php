<?php
session_start();
include "../components/config/config.php";
$jugadore = $jugadores->traerGoleadores();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZonaFutbol</title>
    <?php include "../components/header/links_header.php" ?>
    <style>
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
            text-align: center;
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
        a{
            text-decoration: none;
        }
    </style>
</head>

<body>
    <?php include "../components/header/navbar2_2.php" ?>

    <div class="mini-nav">
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link active" href="estadisticas.php">Goleadores</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="tarjetas.php">Tarjetas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="asistencias.php">Asistencias</a>
            </li>

        </ul>
    </div>

    <div class="container">
        <table class="table">
            <thead>
                <th></th>
                <th>Jugador</th>
                <th>Equipo</th>
                <th>GF</th>
                <th>PJ</th>
                <th>G/P</th>
            </thead>

            <tbody>
                <?php
                foreach ($jugadore as $key => $value) {
                    $equipo = $equipos->traerEquipo($value->equipo_id);
                    echo "<tr>";
                    echo "<td>" . $key + 1 . "</td>";
                    ?>
                    <td><a href="jugador.php?jugador_id=<?php echo $value->jugador_id ?>"><?php echo $value->nombre ?></a></td>
                    <?php
                    echo "<td>" . $equipo['nombre_equipo'] . "</td>";
                    echo "<td><strong>" . $value->goles . "</strong></td>";
                    echo "<td>" . $value->partidos_jugados . "</td>";
                    if ($value->partidos_jugados == 0) {
                        echo "<td>0.00</td>";
                    }else{
                    echo "<td>" . number_format($value->goles / $value->partidos_jugados,2,",",".") . "</td>";}
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>



    <?php include "../components/header/footer.php" ?>

</body>

</html>