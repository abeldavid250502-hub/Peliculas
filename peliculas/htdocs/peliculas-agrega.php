<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Agregar Película</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>

<?php require "header.php" ?>
<main>
    <h1>Agregar Película</h1>
    <p><a href="peliculas-lista.php">Cancelar</a></p>

    <form action="peliculas-inserta.php" method="post">
        <p>
            <label>Título *
                <input name="titulo" required>
            </label>
        </p>

        <p>
            <label>Director *
                <input name="director" required>
            </label>
        </p>

        <p>
            <label>Año
                <input name="anio" type="number">
            </label>
        </p>

        <p>
            <label>Género
                <input name="genero">
            </label>
        </p>

        <p>
            <label>Duración (min)
                <input type="number" name="duracion">
            </label>
        </p>

        <p>
            <label>Descripción
                <input name="descripcion">
            </label>
        </p>

        <p>* Obligatorio</p>
        <button type="submit">Agregar</button>
    </form>
</main>

<?php require "footer.php" ?>
</body>
</html>
