<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicia sesión</title>
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

        a{
            text-decoration: none;
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
                        <h4 class="mb-0">Iniciar Sesión</h4>
                    </div>
                    <div class="card-body">
                        <form action="login.php" method="POST">
                            <?php
                            if (isset($_GET["error"])) {
                                // Mostrar el mensaje de error
                                echo "<div class='alert alert-danger'>" . $_GET["error"] . "</div>";
                            }

                            if (isset($_GET["exito"])) {
                                // Mostrar el mensaje de error
                                echo "<div class='alert alert-success'>" . $_GET["exito"] . "</div>";
                            }


                            ?>
                            <div class="form-group">
                                <label for="username">Nombre de usuario</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <button type="submit" class="btn btn-custom">Iniciar Sesión</button>
                                <a href="registrarse.php">Registrarse</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>