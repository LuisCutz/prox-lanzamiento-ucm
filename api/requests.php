<?php
require_once __DIR__ . '/../utils/translate.php';

const API_URL = "https://whenisthenextmcufilm.com/api";

function translate_type($type) {
    switch ($type) {
        case 'Movie':
            return 'Película';
        case 'TV Show':
            return 'Serie';
        default:
            return 'Otro';
    }
}

function get_mcu_data() {
    $data = file_get_contents(API_URL);
    $json = json_decode($data, true);

    $tipo_actual = translate_type($json['type']);
    $tipo_siguiente = translate_type($json['following_production']['type']);

    $overviewActual = translate_text($json['overview']);
    $overviewSiguiente = translate_text($json['following_production']['overview']);

    return [
        'json' => $json,
        'tipo_actual' => $tipo_actual,
        'tipo_siguiente' => $tipo_siguiente,
        'overviewActual' => $overviewActual,
        'overviewSiguiente' => $overviewSiguiente
    ];
}