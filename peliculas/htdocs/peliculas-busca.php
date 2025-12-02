<?php
require_once "bd/Bd.php";
require_once "bd/recuperaIdEntero.php";

try {
    $id = recuperaIdEntero("id");

    $pdo = Bd::pdo();
    $stmt = $pdo->prepare("SELECT * FROM peliculas WHERE id = :id");
    $stmt->execute([":id" => $id]);
    $pelicula = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($pelicula === false)
        throw new Exception("Película no encontrada.");

    $idHtml          = htmlentities($id);
    $tituloHtml      = htmlentities($pelicula["titulo"]);
    $directorHtml    = htmlentities($pelicula["director"]);
    $anioHtml        = htmlentities($pelicula["anio"]);
    $generoHtml      = htmlentities($pelicula["genero"]);
    $duracionHtml    = htmlentities($pelicula["duracion"]);
    $descripcionHtml = htmlentities($pelicula["descripcion"]);

    require "peliculas-modifica.php";

} catch (Exception $e) {
    $errorHtml = htmlentities($e->getMessage());
    require "error.php";
}
