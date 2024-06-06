<?php
session_start();
include "components/config/config.php";


extract($_POST);

$usuarios->comprobarLog($username,$password);

?>