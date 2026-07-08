<?php
$caminhologs = dirname(__DIR__) . "/controller/logs.json";

$listaLog = [];

if (file_exists($caminhologs)) {
    $conteudoLogs = file_get_contents($caminhologs);
    $conteudoDecodificado = json_decode($conteudoLogs, true) ?? [];

    $listaLog = array_reverse($conteudoDecodificado);
}
