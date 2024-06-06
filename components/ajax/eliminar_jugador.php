<?php 
include "../config/config.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['id'])) {
        $id = intval($_POST['id']);
        $jugadores->eliminarJugador($id);
    }
}

?>