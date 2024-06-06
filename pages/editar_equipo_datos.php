<?php
session_start();
include "login_check.php";
include "../components/config/config.php";

//echo $_SESSION['username'];

$equi = $equipos->traerEquipo($_GET['id']);
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
                <h2 class="mb-4">Editar Equipo</h2>
                <!-- Formulario -->
                <form action="guardar_equipo_editado.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="equipo_id" value="<?php echo $_GET['id']?>">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Ingrese el nombre del equipo" value="<?php echo !empty($equi['nombre_equipo']) ? $equi['nombre_equipo'] : "" ?>" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea name="descripcion" class="form-control" id="descripcion" rows="10" cols="50" required><?php echo !empty($equi['descripcion']) ? $equi['descripcion'] : "" ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="autor" class="form-label">Sede</label>
                        <input type="text" class="form-control" name="sede" id="sede" placeholder="Ingrese la sede" value="<?php echo !empty($equi['sede']) ? $equi['sede'] : "" ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="fundacion" class="form-label">Fundación</label>
                        <input type="date" class="form-control" name="fundacion" id="fundacion" value="<?php echo !empty($equi['fecha_fundacion']) ? $equi['fecha_fundacion'] : "" ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="entrenador" class="form-label">Entrenador</label>
                        <input type="text" class="form-control" name="entrenador" id="entrenador" placeholder="Ingrese el entrenador" value="<?php echo !empty($equi['entrenador_principal']) ? $equi['entrenador_principal'] : "" ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="estadio" class="form-label">Estadio</label>
                        <input type="text" class="form-control" name="estadio" id="estadio" placeholder="Ingrese el estadio" value="<?php echo !empty($equi['estadio_principal']) ? $equi['estadio_principal'] : "" ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="color_primario" class="form-label">Color Primario</label>
                        <input type="color" class="form-control form-control-color" name="color_primario" id="color_primario" value="<?php echo !empty($equi['color_primario']) ? $equi['color_primario'] : "" ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="color_secundario" class="form-label">Color Secundario</label>
                        <input type="color" class="form-control form-control-color" name="color_secundario" id="color_secundario" value="<?php echo !empty($equi['color_secundario']) ? $equi['color_secundario'] : "" ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="pagina" class="form-label">Página Web</label>
                        <input type="text" class="form-control" name="pagina" id="pagina" placeholder="Ingrese la página web" value="<?php echo !empty($equi['pagina_web_oficial']) ? $equi['pagina_web_oficial'] : "" ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="twitter" class="form-label">Twitter</label>
                        <input type="text" class="form-control" name="twitter" id="twitter" placeholder="Ingrese el twitter" value="<?php echo !empty($equi['twitter']) ? $equi['twitter'] : "" ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="tiktok" class="form-label">Tik tok</label>
                        <input type="text" class="form-control" name="tiktok" id="tiktok" placeholder="Ingrese el tiktok" value="<?php echo !empty($equi['tiktok']) ? $equi['tiktok'] : "" ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="insta" class="form-label">Instagram</label>
                        <input type="text" class="form-control" name="insta" id="insta" placeholder="Ingrese el Instagram" value="<?php echo !empty($equi['instagram']) ? $equi['instagram'] : "" ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="imagen" class="form-label">Escudo</label>
                        <input type="file" class="form-control" name="archivo" id="archivo" accept="image/*" >
                    </div>

                    <button type="submit" class="btn btn-primary mb-5">Enviar</button>
                </form>
                <!-- Fin del formulario -->
            </div>
        </div>
    </div>
    
   
</body>
</html>