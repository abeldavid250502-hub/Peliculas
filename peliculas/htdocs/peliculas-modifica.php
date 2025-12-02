<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Modificar Película</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <?php require "header.php" ?>

    <main>
        <form action="peliculas-actualiza.php" method="post">

            <h1>Modificar Película</h1>
            <p><a href="peliculas-lista.php">Cancelar</a></p>

            <input name="id" type="hidden" value="<?= $idHtml ?>">

            <p>
                <label>Título *
                    <input name="titulo" value="<?= $tituloHtml ?>" required>
                </label>
            </p>
            <p>
                <label>Director *
                    <input name="director" value="<?= $directorHtml ?>" required>
                </label>
            </p>
            <p>
                <label>Año
                    <input name="anio" type="number" value="<?= $anioHtml ?>">
                </label>
            </p>
            <p>
                <label>Género
                    <input name="genero" value="<?= $generoHtml ?>">
                </label>
            </p>
            <p>
                <label>Duración (min)
                    <input name="duracion" type="number" value="<?= $duracionHtml ?>">
                </label>
            </p>
            <p>
                <label>Descripción
                    <input name="descripcion" value="<?= $descripcionHtml ?>">
                </label>
            </p>

            <p>* Obligatorio</p>

            <button type="submit">Guardar Cambios</button>

            <button type="submit"
                    formaction="peliculas-elimina.php"
                    onclick="if (!confirm('¿Confirma la eliminación de la película?')) { event.preventDefault() }">
                Eliminar Película
            </button>

        </form>
    </main>

    <?php require "footer.php" ?>
</body>
</html>
