<?php
require_once "bd/Bd.php";

try {
    $bd = Bd::pdo();

    $stmt = $bd->prepare("SELECT id, nombre, correo FROM usuarios ORDER BY nombre");
    $stmt->execute();
    $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $render = "";
    foreach ($lista as $u) {
        $id      = htmlentities(urlencode($u['id']));
        $nombre  = htmlentities($u['nombre']);
        $correo  = htmlentities($u['correo']);

        $render .= "
        <li>
            <p><a href='usuarios-busca.php?id=$id'>$nombre ($correo)</a></p>
        </li>";
    }

    require "usuarios-lista.php";

} catch (Exception $error) {
    $errorHtml = htmlentities($error->getMessage());
    require "error.php";
}
