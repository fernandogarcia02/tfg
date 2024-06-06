<?php
session_start();
include "../components/config/config.php";
$clasi = $equipos->ordenarClasificacion();
//var_dump($clasi);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZonaFutbol</title>
    <?php include "../components/header/links_header.php" ?>
    <style>
        .icono-equipo img {
            width: 30px;
            /* Ancho deseado del icono */
            height: 40px;
            /* Altura deseada del icono */
            object-fit: contain;
        }

        a{
            text-decoration: none;
        }
       
    </style>
</head>

<body>
    <?php include "../components/header/navbar2_2.php" ?>
    <div class="container">
        <table class="table">
            <thead>
                <th>POS</th>
                <th></th>
                <th>EQUI</th>
                <th>PT</th>
                <th>PJ</th>
                <th>PG</th>
                <th>PE</th>
                <th>PP</th>
                <th>GF</th>
                <th>GC</th>
            </thead>

            <tbody>
                <?php
                foreach ($clasi as $key => $value) {
                    $equi = $equipos->traerEquipo($value->equipo_id);
                    if ($key + 1 == 1 || $key + 1 == 2) {
                        echo "<tr class='table-success'>";
                    }elseif($key + 1 == 3 || $key + 1 == 4 || $key + 1 == 5 || $key + 1 == 6 ){
                        echo "<tr class='table-primary'>";
                    }elseif($key +1 == 19 || $key +1 == 20 || $key +1 == 21 || $key +1 == 22){
                        echo "<tr class='table-danger'>";
                    }else{
                        echo "<tr>";
                    }
                    echo "<td>" . $key + 1 . "</td>";
                ?>
                    <td>
                        <div class="icono-equipo">
                            <img src="../archivos/escudos/<?php echo $equi['escudo_url'] ?>" alt="Escudo">
                        </div>
                    </td>
                    <td>
                    <a href="equipo.php?equipo_id=<?php echo $value->equipo_id ?>"><?php echo $equi['nombre_equipo'] ?></a>
                    </td>
                <?php
                    
                    echo "<td>" . $value->puntos . "</td>";
                    echo "<td>" . $value->partidos_jugados . "</td>";
                    echo "<td>" . $value->partidos_ganados . "</td>";
                    echo "<td>" . $value->partidos_empatados . "</td>";
                    echo "<td>" . $value->partidos_perdidos . "</td>";
                    echo "<td>" . $value->goles_a_favor . "</td>";
                    echo "<td>" . $value->goles_en_contra . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>

        </table>
    </div>


    <?php include "../components/header/footer.php" ?>
</body>

</html>