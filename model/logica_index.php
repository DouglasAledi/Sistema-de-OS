<?php

require dirname(__DIR__) . "/model/salvar_registro.php";

$caminhoJSON = dirname(__DIR__) . "/controller/registros.json";


$conteudoJson = file_exists($caminhoJSON) ? file_get_contents($caminhoJSON) : "";
$listaRegistro = json_decode($conteudoJson, true) ?? [];

$ultimoServico = $listaRegistro[0] ?? null;

$totalClientesAtivos = 0;
$pendentes = 0;
$emAndamento = 0;
$finalizados = 0;
$clientesContados = [];

foreach ($listaRegistro as $item) {
    if ($item['status'] === 'Pendente') {
        $pendentes++;
    } elseif ($item['status'] === 'Em andamento') {
        $emAndamento++;
    } elseif ($item['status'] === 'Finalizado') {
        $finalizados++;
    }

    if (!empty($item['nomeCliente']) && !in_array($item['nomeCliente'], $clientesContados)) {
        $clientesContados[] = $item['nomeCliente'];
    }
}

$totalClientesAtivos = count($clientesContados);
