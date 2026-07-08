<?php
require dirname(__DIR__) . "/logica/logica_confirmar_exclusao.php";
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
        <p class="conteudo_tela_exclusao_texto">Você tem certeza que deseja excluir o serviço <strong><?= $itemParaExcluir['titulo'] ?></strong> do cliente <strong><?= $itemParaExcluir['nomeCliente'] ?></strong>?</p>

        <div class="botoes_container">
            <a href="index.php" class="botao_voltar">Não, voltar</a>

            <a href="../model/deletar_registro.php?id=<?= $itemParaExcluir['id'] ?>" class="botao_excluir">Sim, excluir</a>
        </div>
    </div>

</body>

</html>