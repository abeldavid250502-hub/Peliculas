<?php

function validaTexto($texto): string {
    if ($texto === false || trim($texto) === '') {
        throw new Exception("Falta un dato obligatorio.");
    }

    $texto = trim($texto);
    $texto = stripslashes($texto);
    $texto = htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');

    return $texto;
}
