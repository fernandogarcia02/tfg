<?php
session_start();
include "../components/config/config.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZonaFutbol</title>
    <?php include "../components/header/links_header.php" ?>
    <link rel="stylesheet" href="../css/calendario.css">
    <style>
        img{
            object-fit: contain;
        }
    </style>
</head>
<body>
    <?php include "../components/header/navbar2_2.php" ?>
    <?php

    $asa = $equipos->traerCalendario();
    //$asa = $equipos->traerEscudo("2");
    //   echo "<pre>";
    //   var_dump($asa);
    //   echo "</pre>";
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
                            echo $value->fecha;

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
    
   
</body>
</html>