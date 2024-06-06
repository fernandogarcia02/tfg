<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrate</title>
    <?php include "./components/header/links_header.php"; ?>
    <style>
        .btn-custom {
            background-color: #28a745;
            border-color: #28a745;
            color: #fff;
        }

        .btn-custom:hover {
            background-color: #d3fadc;
            border-color: #d3fadc;
            color: #28a745;
        }
    </style>
</head>

<body>
    <?php include "components/header/navbar2.php" ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Registrarse
                    </div>
                    <div class="card-body">
                        <form action="./registrar_usuario.php" method="POST">
                            <?php
                            if (isset($_GET["error"])) {
                                // Mostrar el mensaje de error
                                echo "<div class='alert alert-danger'>" . $_GET["error"] . "</div>";
                            }

                            ?>
                            <div class="form-group">
                                <label for="nombre">Nombre completo:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                            <div class="form-group">
                                <label for="nombre">Username:</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="correo">Correo electrónico:</label>
                                <input type="email" class="form-control" id="correo" name="correo" required>
                            </div>
                            <div class="form-group">
                                <label for="correo">Fecha de nacimiento:</label>
                                <input type="date" class="form-control" id="nacimiento" name="nacimiento" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="contrasena">Contraseña:</label>
                                <input type="password" class="form-control" id="contrasena" name="contrasena" required>
                            </div>
                            <div class="form-group">
                                <label for="confirmar_contrasena">Confirmar contraseña:</label>
                                <input type="password" class="form-control" id="confirmar_contrasena" name="confirmar_contrasena" required>
                            </div>
                            <button type="submit" class="btn btn-custom mt-3">Registrarse</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>