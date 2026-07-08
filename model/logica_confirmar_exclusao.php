<?php

$idDoItem = (int)$_GET["id"];

$caminhoJSON = dirname(__DIR__) . "/controller/registros.json";

$conteudoJson = file_exists($caminhoJSON) ? file_get_contents($caminhoJSON) : "";
$listaRegistro = json_decode($conteudoJson, true) ?? [];

$itemParaExcluir = null;

foreach ($listaRegistro as $chave => $item) {
    if ($item["id"] == $idDoItem) {
        $itemParaExcluir = $item;
        break;
    }
}

if (!$itemParaExcluir) {
    header("Location: ../view/index.php");
    exit;
}
