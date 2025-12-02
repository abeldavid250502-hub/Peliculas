<?php
require_once "bd/Bd.php";

try {
    $pdo = Bd::pdo();
    $stmt = $pdo->query("
        SELECT id, titulo, director, anio
        FROM peliculas
        ORDER BY titulo
    ");
    $peliculas = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $render = "";
    foreach ($peliculas as $p) {
        $id       = htmlentities($p['id']);
        $titulo   = htmlentities($p['titulo']);
        $director = htmlentities($p['director']);
        $anio     = htmlentities($p['anio']);

        $render .= "
        <li>
            <p>
                <a href='peliculas-busca.php?id=$id'>$titulo</a> – Dir. $director ($anio)
            </p>
        </li>";
    }

    require "peliculas-vista.php";

} catch (Exception $e) {
    $errorHtml = htmlentities($e->getMessage());
    require "error.php";
}
