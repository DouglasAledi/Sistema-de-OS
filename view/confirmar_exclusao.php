<?php

    $idDoItem = (int)$_GET["id"];

    $caminhoJSON = dirname(__DIR__) . "/controller/registros.json";

    $conteudoJson = file_exists($caminhoJSON) ? file_get_contents($caminhoJSON) : "";
    $listaRegistro = json_decode($conteudoJson, true) ?? [];

    $itemParaExcluir = null;

    foreach ($listaRegistro as $chave => $item) {
        if ($item["id"] == $idDoItem){
            $itemParaExcluir = $item;
            break;
        }
    }

    if(!$itemParaExcluir){
        header("Location: ../view/index.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Confirmar Exclusão</title>

    <link rel="stylesheet" href="../style/confirmar_exclusao_php.css">
</head>
<body>

    <div class="conteudo_tela_exclusao">
        <h2>Confirmar Exclusão</h2>
        <p>Você tem certeza que deseja excluir o serviço <strong><?= $itemParaExcluir['titulo'] ?></strong> do cliente <strong><?= $itemParaExcluir['nomeCliente'] ?></strong>?</p>

        <div class="botoes_container">
            <a href="index.php" style="background: gray; color: white; padding: 10px; text-decoration: none;">Não, voltar</a>

            <a href="../model/deletar_registro.php?id=<?= $itemParaExcluir['id'] ?>" style="background: red; color: white; padding: 10px; text-decoration: none;">Sim, excluir</a>
        </div>
    </div>

</body>
</html>