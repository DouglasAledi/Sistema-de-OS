<?php

function registrarAcao(string $acao, int $servicoId, string $detalhes): void {
    $caminhoLog = dirname(__DIR__) . "/controller/logs.json";

    // 1. Ler os logs existentes (se o arquivo não existir, começa com um array vazio)
    $conteudoJson = file_exists($caminhoLog) ? file_get_contents($caminhoLog) : "";
    $listaLogs = json_decode($conteudoJson, true) ?? [];

    // 2. Criar a estrutura do novo log
    $novoLog = [
        "data" => $data,
        "hora" => $hora,
        "acao" => $acao, // Ex: 'CRIAR', 'EDITAR', 'EXCLUIR'
        "servico_id" => $servicoId,
        "detalhes" => $detalhes
    ];

    // 3. Adicionar o novo log no INÍCIO do array (assim o mais recente fica no topo)
    array_unshift($listaLogs, $novoLog);

    // 4. Salvar de volta no arquivo logs.json
    $jsonFinal = json_encode($listaLogs, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    file_put_contents($caminhoLog, $jsonFinal);
}