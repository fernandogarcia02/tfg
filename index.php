<?php
session_start();
if(!isset($_SESSION['username'])){
    $_SESSION = array();
}
include "components/config/config.php";
$portada = $noticias->traerPortada();


//var_dump($portada);
$notis = $noticias->traerNoticiasInd();
// echo "<pre>";
// var_dump($noticias);
// echo "</pre>";


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZonaFutbol</title>
    <?php include "components/header/links_header.php" ?>
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <?php include "components/header/navbar2.php" ?>
    <div class="container">
        <div class="main clicable" data-id="<?php echo $portada->noticia_id ?>">
            <img src="archivos/<?php echo $portada->imagen_url ?>" alt="Descripción de la imagen" class="media">

            <div class="text-container">
                <p><?php echo $portada->autor ?></p>
            </div>
            <div class="h1-container">
                <h1 class="title"><?php echo $portada->titulo ?></h1>
            </div>
        </div>


        <aside class="aside">
            <?php
            for ($i = 0; $i < 3; $i++) {
                $noti = $notis[$i];
            ?>
                <div class="small-news clicable" data-id="<?php echo $noti->noticia_id ?>">
                    <img src="archivos/<?php echo $noti->imagen_url ?>" alt="Descripción de la imagen" class="media-aside">


                    <div class="h4-container">
                        <h4 class="title4"><?php echo $noti->titulo ?></h4>
                    </div>
                </div>
            <?php
            }
            ?>
        </aside>

    </div>

    <div class="linea"></div>

    <div class="container2">
        <?php
        for ($i = 3; $i < count($notis); $i++) {
            $noti = $notis[$i];
        ?>
            <div class="normal clicable" data-id="<?php echo $noti->noticia_id ?>">
                <img src="archivos/<?php echo $noti->imagen_url ?>" alt="Descripción de la imagen" class="media-normal">

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

    <?php
        include "components/header/footer.php";
    ?>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        let clicableDivs = document.querySelectorAll(".clicable");

        clicableDivs.forEach(function(div) {
            div.addEventListener("click", function() {
                let id = div.getAttribute("data-id");
                location.href = "pages/noticia.php?noticia_id="+id;
            });
        });
    });
</script>


</body>

</html>