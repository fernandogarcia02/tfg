<?php
session_start();
include "../components/config/config.php";


echo "<pre>";
var_dump($_POST);
echo "</pre>";

if ($_POST) {

    if(isset($_POST['jugadoresgol_locales'])){
        foreach ($_POST['jugadoresgol_locales'] as $key => $gol) {
            if (!in_array($gol,$_POST['jugadores_locales'])) {
                header("location:ver_calendario.php?error=Datos+enviados+incorrectos");
                exit;
            }
        }
    }

    if(isset($_POST['jugadoresgol_visitantes'])){
        foreach ($_POST['jugadoresgol_visitantes'] as $key => $gol) {
            if (!in_array($gol,$_POST['jugadores_visitantes'])) {
                header("location:ver_calendario.php?error=Datos+enviados+incorrectos");
                exit;
            }
        }
    }

    if(isset($_POST['jugadoresasis_locales'])){
        foreach ($_POST['jugadoresasis_locales'] as $key => $asis) {
            if (!in_array($asis,$_POST['jugadores_locales'])) {
                header("location:ver_calendario.php?error=Datos+enviados+incorrectos");
                exit;
            }
        }
    }


    if(isset($_POST['jugadoresasis_visitantes'])){
        foreach ($_POST['jugadoresasis_visitantes'] as $key => $asis) {
            if (!in_array($asis,$_POST['jugadores_visitantes'])) {
                header("location:ver_calendario.php?error=Datos+enviados+incorrectos");
                exit;
            }
        }
    }
    
    // if (count($_POST['jugadores_locales'])<11) {
    //     header("location:ver_calendario.php?error=Datos+enviados+incorrectos");
    //     exit;
    // }

    
    // if (count($_POST['jugadores_visitantes'])<11) {
    //     header("location:ver_calendario.php?error=Datos+enviados+incorrectos");
    //     exit;
    // }

    if (isset($_POST['jugadoresgol_locales']) && isset($_POST['ngoles_local'])) {
        $equipos->goles($_POST['jugadoresgol_locales'], $_POST['ngoles_local']);
    }

    if (isset($_POST['jugadoresgol_visitantes']) && isset($_POST['ngoles_visitante'])) {
        $equipos->goles($_POST['jugadoresgol_visitantes'], $_POST['ngoles_visitante']);
    }

    if (isset($_POST['jugadoresasis_locales']) && isset($_POST['nsis_local'])) {
        $equipos->asistencias($_POST['jugadoresasis_locales'], $_POST['nsis_local']);
    }

    if (isset($_POST['jugadoresasis_visitantes']) && isset($_POST['nsis_visitante'])) {
        $equipos->asistencias($_POST['jugadoresasis_visitantes'], $_POST['nsis_visitante']);
    }

    if (isset($_POST['jugadoresama_locales'])) {
        $equipos->tarjetasAma($_POST['jugadoresama_locales']);
    }

    if (isset($_POST['jugadoresama_visitantes'])) {
        $equipos->tarjetasAma($_POST['jugadoresama_visitantes']);
    }

    if (isset($_POST['jugadoresroj_locales'])) {
        $equipos->tarjetasRojas($_POST['jugadoresroj_locales']);
    }

    if (isset($_POST['jugadoresroj_visitantes'])) {
        $equipos->tarjetasRojas($_POST['jugadoresroj_visitantes']);
    }

    $equipos->pjugados($_POST['jugadores_locales']);
    $equipos->pjugados($_POST['jugadores_visitantes']);

    $equipos->guardarResultado($_POST['id_local'],$_POST['id_visitante'],$_POST['resultadoloc'],$_POST['resultadovis'],$_POST['id_jornada']);
    
    $equipos->clasificacion($_POST['id_local'],$_POST['id_visitante'],$_POST['resultadoloc'],$_POST['resultadovis']);

    header("location:ver_calendario.php");
    exit;
    



}



?>