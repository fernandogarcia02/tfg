<style>
    .navbar-green {
        background-color: #28a745;
    }

    .navbar-green .navbar-brand,
    .navbar-green .nav-link,
    .navbar-green .btn {
        color: #fff;
    }

    .navbar-green .btn:hover {
        background-color: #fff;
        color: #28a745;
    }

    .pblanco {
        color: #fff;
        margin: 0;
        padding-right: 20px;
    }

    .contenedor {
        display: flex;
        align-items: center;
    }

    .logout {
        border-radius: 5px;
        padding: 5px 8px;
        background-color: #28a745;
        border: solid 1px red;
    }

    .bi {
        color: red;
    }

    .logout:hover {
        background-color: red;
    }

    .logout:hover .bi {
        color: white;

    }

    .navbar-nav .nav-item.active .nav-link {
        background-color: #fff;
        /* Color de fondo */
        color: #28a745;
        /* Color del texto */
        border-radius: 5px;
        /* Otros estilos que desees aplicar */
    }
</style>

<?php
// Obtener la URL de la página actual
$current_page = $_SERVER['REQUEST_URI'];
?>


<nav class="navbar navbar-expand-lg navbar-green">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">LaLiga HyperMotion</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item <?php echo strpos($current_page, 'index.php') !== false || strpos($current_page, 'noticia.php') !== false  ? 'active' : ''; ?>">
                    <a class="nav-link" href="index.php">Noticias</a>
                </li>
                <li class="nav-item <?php echo strpos($current_page, 'calendario.php') !== false ? 'active' : ''; ?>">
                    <a class="nav-link" href="pages/calendario.php">Calendario</a>
                </li>
                <li class="nav-item <?php echo strpos($current_page, 'clasificacion.php') !== false ? 'active' : ''; ?>">
                    <a class="nav-link" href="pages/clasificacion.php">Clasificación</a>
                </li>
                <li class="nav-item <?php echo strpos($current_page, 'estadisticas.php') !== false ? 'active' : ''; ?>">
                    <a class="nav-link" href="pages/estadisticas.php">Estadísticas</a>
                </li>
            </ul>
        </div>
        <div class="d-flex">
            <?php
            if (isset($_SESSION['username'])) {
                echo "<div class='contenedor'>";
                echo "<p class='pblanco'>" . $_SESSION['username'] . "</p>"; ?>
                <button type="button" onclick="window.location.href='logout.php'" class="logout"><i class="bi bi-box-arrow-left"></i></button>
            <?php echo "</div>";
            } else {
            ?>
                <button class="btn btn-outline-light ms-auto" type="button" onclick="window.location.href='inicio_sesion.php'">Iniciar sesión</button>
            <?php
            }
            ?>
        </div>
    </div>
</nav>