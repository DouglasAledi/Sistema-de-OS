<?php

function registrarAcao(string $data, string $hora, string $acao, int $servicoId, string $detalhes): void {
    $caminhoLog = dirname(__DIR__) . "/controller/logs.json";

    $conteudoJson = file_exists($caminhoLog) ? file_get_contents($caminhoLog) : "";
    $listaLogs = json_decode($conteudoJson, true) ?? [];

    $novoLog = [
        "data" => $data,
        "hora" => $hora,
        "acao" => $acao,
        "servico_id" => $servicoId,
        "detalhes" => $detalhes
    ];

    array_unshift($listaLogs, $novoLog);

    $jsonFinal = json_encode($listaLogs, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    file_put_contents($caminhoLog, $jsonFinal);
}