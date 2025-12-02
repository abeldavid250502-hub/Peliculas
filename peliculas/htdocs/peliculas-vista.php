<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Películas - Cine</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <?php require "header.php" ?>

    <main>
        <h1>Gestión de Películas</h1>
        
        <p><a href="peliculas-agrega.php">Agregar nueva película</a></p>

        <ul><?= $render ?></ul>
    </main>

    <?php require "footer.php" ?>
</body>
</html>
