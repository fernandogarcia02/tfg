<?php
session_start();
include "login_check.php";
include "../components/config/config.php";

extract($_POST);

if (isset($_POST['local'])) {
    if ($_POST['local'] == $_POST['visitante']) {
        header("location:crear_calendario.php?error=No+puede+jugar+un+equipo+contra+si+mismo");
        exit;
    }
}

$equipos->crear_Calendario($jornada,$fecha,$local,$visitante);