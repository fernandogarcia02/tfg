<?php
session_start();
include "login_check.php";
//echo $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZonaFutbol</title>
    <?php include "../components/header/links_header.php" ?>
</head>
<body>
    <?php include "../components/header/navbar.php" ?>
    
    <div class="container mt-5">
    <?php 
            if(isset($_GET['mensaje'])){
                ?>
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading"> <?php echo $_GET['mensaje']?></h4>
                   
                </div>
            <?php
            }
        ?>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="mb-4">Crear Equipo</h2>
                <!-- Formulario -->
                <form action="guardar_equipo.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Ingrese el nombre del equipo" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea name="descripcion" class="form-control" id="descripcion" rows="10" cols="50" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="autor" class="form-label">Sede</label>
                        <input type="text" class="form-control" name="sede" id="sede" placeholder="Ingrese la sede" required>
                    </div>

                    <div class="mb-3">
                        <label for="fundacion" class="form-label">Fundación</label>
                        <input type="date" class="form-control" name="fundacion" id="fundacion" required>
                    </div>

                    <div class="mb-3">
                        <label for="entrenador" class="form-label">Entrenador</label>
                        <input type="text" class="form-control" name="entrenador" id="entrenador" placeholder="Ingrese el entrenador" required>
                    </div>

                    <div class="mb-3">
                        <label for="estadio" class="form-label">Estadio</label>
                        <input type="text" class="form-control" name="estadio" id="estadio" placeholder="Ingrese el estadio" required>
                    </div>

                    <div class="mb-3">
                        <label for="color_primario" class="form-label">Color Primario</label>
                        <input type="color" class="form-control form-control-color" name="color_primario" id="color_primario" required>
                    </div>

                    <div class="mb-3">
                        <label for="color_secundario" class="form-label">Color Secundario</label>
                        <input type="color" class="form-control form-control-color" name="color_secundario" id="color_secundario" required>
                    </div>

                    <div class="mb-3">
                        <label for="pagina" class="form-label">Página Web</label>
                        <input type="text" class="form-control" name="pagina" id="pagina" placeholder="Ingrese la página web" required>
                    </div>

                    <div class="mb-3">
                        <label for="twitter" class="form-label">Twitter</label>
                        <input type="text" class="form-control" name="twitter" id="twitter" placeholder="Ingrese el twitter" required>
                    </div>

                    <div class="mb-3">
                        <label for="tiktok" class="form-label">Tik tok</label>
                        <input type="text" class="form-control" name="tiktok" id="tiktok" placeholder="Ingrese el tiktok" required>
                    </div>

                    <div class="mb-3">
                        <label for="insta" class="form-label">Instagram</label>
                        <input type="text" class="form-control" name="insta" id="insta" placeholder="Ingrese el Instagram" required>
                    </div>

                    <div class="mb-3">
                        <label for="imagen" class="form-label">Escudo</label>
                        <input type="file" class="form-control" name="archivo" id="archivo" accept="image/*" required>
                    </div>

                    <button type="submit" class="btn btn-primary mb-5">Enviar</button>
                </form>
                <!-- Fin del formulario -->
            </div>
        </div>
    </div>
    
   
</body>
</html>