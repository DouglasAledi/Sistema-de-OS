<?php

if (!isset($_GET["id"])) {
    header("Location: index.php");
    exit;
}

$idUrl = (int)$_GET["id"];

$servicoEncontrado = null;

$caminhoJSON = dirname(__DIR__) . ("/controller/registros.json");

$conteudoJson = file_exists($caminhoJSON) ? file_get_contents($caminhoJSON) : "";

$listaRegistro = json_decode($conteudoJson, true) ?? [];

foreach ($listaRegistro as $id) {
    if ($idUrl == $id["id"]) {
        $servicoEncontrado = $id;
        break;
    }
}
if (!$servicoEncontrado) {
    header("Location: index.php");
    exit;
}
