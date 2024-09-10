<?php
function translate_text($texto, $idiomaDestino = 'es', $idiomaOrigen = 'en') {
    $texto = urlencode($texto);
    $url = "https://translate.googleapis.com/translate_a/single?client=gtx&sl={$idiomaOrigen}&tl={$idiomaDestino}&dt=t&q={$texto}";

    $respuesta = file_get_contents($url);
    if ($respuesta === false) {
        return "Error en la traducción";
    }

    $resultado = json_decode($respuesta, true);
    if ($resultado === null) {
        return "Error al decodificar la respuesta";
    }

    $traduccion = '';
    foreach ($resultado[0] as $linea) {
        $traduccion .= $linea[0];
    }

    return $traduccion;
}