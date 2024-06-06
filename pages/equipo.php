<?php
session_start();
include "../components/config/config.php";

$equi = $equipos->traerEquipo($_GET['equipo_id']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZonaFutbol</title>
    <?php include "../components/header/links_header.php" ?>
    <style>
        .cuadrado {
            width: 100px;
            height: 100px;
        }
        body, .list-group-item, .card {
            background-color: #f5f5f5;
        }
        .card-img-top {
            max-width: 100%;
            max-height: 200px; /* Puedes ajustar esta altura según sea necesario */
            object-fit: contain; /* Esto asegura que la imagen mantenga su aspecto */
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
        .mini-nav li{
            width: 140px;
        }

        .mini-nav .nav-link.active {
            background-color: #28a745; /* Color de fondo del enlace activo */
            border-color: #28a745;
            color: #fff; /* Color del texto del enlace activo */
        }
        .mini-nav .nav-link {
            background-color: #fff; /* Color de fondo de los enlaces */
            color: #28a745; /* Color del texto de los enlaces */
            border: 1px solid #28a745; /* Borde de los enlaces */
        }
        .mini-nav .nav-link:hover {
            background-color: #28a745;
            color: #fff; /* Color de fondo al pasar el mouse */
        }
    </style>
</head>
<body>
    <?php include "../components/header/navbar2_2.php" ?>

    <div class="container">
        <div class="mini-nav">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link active" href="equipo.php?equipo_id=<?php echo $_GET['equipo_id'] ?>">Ficha</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="noticias_equipo.php?equipo_id=<?php echo $_GET['equipo_id'] ?>">Noticias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="jugadores_equipo.php?equipo_id=<?php echo $_GET['equipo_id'] ?>">Jugadores</a>
                    </li>
                </ul>
            </div>
        <div class="row">
            <div class="col-md-4 mt-3">
                <div class="card">
                    <img src="../archivos/escudos/<?php echo $equi['escudo_url'] ?>" class="card-img-top" alt="Escudo del Equipo">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $equi['nombre_equipo'] ?></h5>
                        <p class="card-text"><?php echo $equi['descripcion'] ?></p>
                        <div class="social-icons">
                            <a href="<?php echo $equi['pagina_web_oficial'] ?>" class="btn btn-primary btn-sm" target="_blank"><i class="bi bi-globe"></i> Sitio Web</a>
                            <?php if ($equi['tiktok'] != 'notiene') { ?>
                                <a href="https://www.tiktok.com/@<?php echo $equi['tiktok'] ?>" class="btn btn-primary btn-sm" target="_blank"><i class="bi bi-tiktok"></i> TikTok</a>
                            <?php } ?>
                            <a href="https://x.com/<?php echo $equi['twitter'] ?>" class="btn btn-primary btn-sm" target="_blank"><i class="bi bi-twitter"></i> Twitter</a>
                            <a href="https://www.instagram.com/<?php echo $equi['instagram'] ?>" class="btn btn-primary btn-sm" target="_blank"><i class="bi bi-instagram"></i> Instagram</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 mt-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Información del Equipo</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Entrenador: <?php echo $equi['entrenador_principal'] ?> </li>
                            <li class="list-group-item">Estadio: <?php echo $equi['estadio_principal'] ?></li>
                            <li class="list-group-item">Fundación: <?php echo $equi['fecha_fundacion'] ?></li>
                            <li class="list-group-item">Color Primario: <div class="cuadrado" style="background-color: <?php echo $equi['color_primario'] ?>;"></div></li>
                            <li class="list-group-item">Color Secundario: <div class="cuadrado" style="background-color: <?php echo $equi['color_secundario'] ?>;"></div></li>
                            <!-- Otros datos relacionados con el club -->
                        </ul>
                    </div>
                </div>
               
            </div>
        </div>
    </div>

    <?php include "../components/header/footer.php" ?>
</body>
</html>
