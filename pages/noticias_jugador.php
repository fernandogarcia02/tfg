<?php
session_start();
include "../components/config/config.php";


$id_notis = $noticias->traerNoticiasJugador($_GET['jugador_id']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZonaFutbol</title>
    <?php include "../components/header/links_header.php" ?>
    <link rel="stylesheet" href="../css/noticias_equipo.css">
</head>

<body>
    <?php include "../components/header/navbar2_2.php" ?>

    <div class="container">
    <div class="mini-nav">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link" href="jugador.php?jugador_id=<?php echo $_GET['jugador_id'] ?>">Ficha</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="noticias_jugador.php?jugador_id=<?php echo $_GET['jugador_id'] ?>">Noticias</a>
                </li>

            </ul>
        </div>

        <div class="container2">
            <?php
            for ($i = 0; $i < count($id_notis); $i++) {
                $noti = $noticias->obtenerNoticiaObj($id_notis[$i]->noticia_id);
            ?>
                <div class="normal clicable" data-id="<?php echo $noti->noticia_id ?>">
                    <img src="../archivos/<?php echo $noti->imagen_url ?>" alt="Descripción de la imagen" class="media-normal">

                    <div class="text-container-normal">
                        <p><?php echo $noti->autor ?></p>
                    </div>
                    <div class="h1-container-normal">
                        <h1 class="title-normal"><?php echo $noti->titulo ?></h1>
                    </div>
                </div>
            <?php

            }
            ?>
        </div>


        <?php include "../components/header/footer.php" ?>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                let clicableDivs = document.querySelectorAll(".clicable");

                clicableDivs.forEach(function(div) {
                    div.addEventListener("click", function() {
                        let id = div.getAttribute("data-id");
                        location.href = "pages/noticia.php?noticia_id=" + id;
                    });
                });
            });
        </script>
</body>

</html>