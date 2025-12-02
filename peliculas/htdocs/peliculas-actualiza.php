<?php
require_once "bd/Bd.php";
require_once "bd/recuperaIdEntero.php";
require_once "bd/recuperaTexto.php";
require_once "bd/validaTexto.php";

try {
    $id          = recuperaIdEntero("id");
    $titulo      = validaTexto(recuperaTexto("titulo"));
    $director    = validaTexto(recuperaTexto("director"));
    $anio        = recuperaTexto("anio");
    $genero      = recuperaTexto("genero");
    $duracion    = recuperaTexto("duracion");
    $descripcion = recuperaTexto("descripcion");

    $pdo = Bd::pdo();

    $stmt = $pdo->prepare("
        UPDATE peliculas
        SET titulo      = :titulo,
            director    = :director,
            anio        = :anio,
            genero      = :genero,
            duracion    = :duracion,
            descripcion = :descripcion
        WHERE id        = :id
    ");

    $stmt->execute([
        ":titulo"      => $titulo,
        ":director"    => $director,
        ":anio"        => $anio,
        ":genero"      => $genero,
        ":duracion"    => $duracion,
        ":descripcion" => $descripcion,
        ":id"          => $id
    ]);

    header("location: peliculas.php");
    exit;

} catch (Exception $e) {
    $errorHtml = htmlentities($e->getMessage());
    require "error.php";
}
