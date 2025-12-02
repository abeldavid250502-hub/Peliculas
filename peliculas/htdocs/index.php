<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$theme_class = ($_COOKIE['theme'] ?? 'light') === 'dark' ? 'dark-mode' : '';

if (!isset($_SESSION['USU_ID'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Cine</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body class="<?= $theme_class ?>">

    <?php require "header.php" ?>

    <main>
        <h1>Cine</h1>
        <p>
            Bienvenido al sistema de gestión de Películas.
        </p>
        <p>
            Usa la navegación superior para acceder a los módulos.
        </p>
    </main>

    <?php require "footer.php" ?>

</body>
</html>
