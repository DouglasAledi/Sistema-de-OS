<?php

    require __DIR__ . "/log_registro.php";

    $caminhoJSON = dirname(__DIR__) . "/controller/registros.json";

    $conteudoJson = file_exists($caminhoJSON) ? file_get_contents($caminhoJSON) : "";

    $idDoItem = (int)$_GET["id"];

    $itensDecodificados = json_decode($conteudoJson, true) ?? [];

    foreach ($itensDecodificados as $chave => $item) {
        if ($idDoItem == $item["id"]){

            $mensagemLog = "O serviço '{$item['titulo']}' do cliente '{$item['nomeCliente']}' foi excluído permanentemente.";
            registrarAcao("EXCLUIR", $item["data"], $item["hora"], $idDoItem, $mensagemLog);

            unset($itensDecodificados[$chave]);
            break;
        }
    }
    
    $jsonSalvo = json_encode($itensDecodificados, JSON_PRETTY_PRINT);
    file_put_contents($caminhoJSON, $jsonSalvo);
    header("Location: ../view/index.php");
    exit;

?>