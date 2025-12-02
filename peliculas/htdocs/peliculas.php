<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['USU_ID'])) {
    header("Location: login.php");
    exit;
}

header("Location: peliculas-lista.php");
exit;

