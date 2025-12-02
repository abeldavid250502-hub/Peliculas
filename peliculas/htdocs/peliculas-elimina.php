<?php
require_once "bd/Bd.php";
require_once "bd/recuperaIdEntero.php";

try {
    $id = recuperaIdEntero("id");

    $bd = Bd::pdo();
    $stmt = $bd->prepare("DELETE FROM peliculas WHERE id = :id");
    $stmt->execute([":id" => $id]);

    header("location: peliculas-lista.php");

} catch (Exception $error) {
    $errorHtml = htmlentities($error->getMessage());
    require "error.php";
}
