<link rel="stylesheet" href="../css/navbar.css">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">ZonaFutbol</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNav">
    <ul class="navbar-nav d-flex justify-content-between">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Noticias
        </a>
        <ul class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown1">
            <li><a class="dropdown-item text-white text-decoration-none" href="crear_noticia.php">Crear Noticia</a></li>
            <li><a class="dropdown-item text-white text-decoration-none" href="editar_noticia.php">Editar Noticia</a></li>
        </ul>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Jugadores
        </a>
        <ul class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown2">
            <li><a class="dropdown-item text-white text-decoration-none" href="crear_jugador.php">Crear Jugador</a></li>
            <li><a class="dropdown-item text-white text-decoration-none" href="editar_jugador.php">Editar Jugador</a></li>
        </ul>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Equipos
        </a>
        <ul class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown3">
            <li><a class="dropdown-item text-white text-decoration-none" href="crear_equipo.php">Crear Equipo</a></li>
            <li><a class="dropdown-item text-white text-decoration-none" href="editar_equipo.php">Editar Equipo</a></li>
        </ul>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown4" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Calendario
        </a>
        <ul class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown4">
            <li><a class="dropdown-item text-white text-decoration-none" href="crear_calendario.php">Crear Calendario</a></li>
            <li><a class="dropdown-item text-white text-decoration-none" href="ver_calendario.php">Ver Calendario</a></li>
        </ul>
    </li>
</ul>

      
    </div>

    <div class="ml-auto">
    <button type="button" onclick="window.location.href='../logout.php'" class="btn btn-outline-danger"><i class="bi bi-box-arrow-left" ></i></button>
    </div>
  </div>
</nav>
