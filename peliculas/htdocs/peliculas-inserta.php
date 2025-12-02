<?php
require_once "bd/Bd.php";
require_once "bd/recuperaTexto.php";
require_once "bd/validaTexto.php";

try {
    $titulo     = validaTexto(recuperaTexto("titulo"));
    $director   = validaTexto(recuperaTexto("director"));
    $anio       = recuperaTexto("anio");
    $genero     = recuperaTexto("genero");
    $duracion   = recuperaTexto("duracion");
    $descripcion= recuperaTexto("descripcion");

    $pdo = Bd::pdo();

    $stmt = $pdo->prepare("
        INSERT INTO peliculas (titulo, director, anio, genero, duracion, descripcion)
        VALUES (:titulo, :director, :anio, :genero, :duracion, :descripcion)
    ");

    $stmt->execute([
        ":titulo"      => $titulo,
        ":director"    => $director,
        ":anio"        => $anio,
        ":genero"      => $genero,
        ":duracion"    => $duracion,
        ":descripcion" => $descripcion,
    ]);

    header("location: peliculas.php");
    exit;

} catch (Exception $e) {
    $errorHtml = htmlentities($e->getMessage());
    require "error.php";
}
