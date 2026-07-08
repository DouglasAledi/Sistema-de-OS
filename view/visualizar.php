<?php
require dirname(__DIR__) . "/model/logica_visualizar.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Visualizar Serviço</title>

    <link rel="stylesheet" href="../style/visualizar.css">
</head>

<body>

    <div class="view-box">
        <h2>Detalhes do Serviço #<?php echo $servicoEncontrado['id']; ?></h2>

        <div class="info-grupo">
            <div class="label">Título do Serviço</div>
            <div class="dado"><?php echo $servicoEncontrado['titulo']; ?></div>
        </div>

        <div class="info-grupo">
            <div class="label">Nome do Cliente</div>
            <div class="dado"><?php echo $servicoEncontrado['nomeCliente']; ?></div>
        </div>

        <div class="info-grupo">
            <div class="label">Descrição</div>
            <div class="dado" style="max-width: 100%; overflow-wrap: break-word; word-break: break-word; white-space: pre-wrap;"><?php echo nl2br(htmlspecialchars($servicoEncontrado['descricao'])); ?></div>
        </div>

        <div class="info-grupo">
            <div class="label">Status Atual</div>
            <div class="dado"><?php echo $servicoEncontrado['status']; ?></div>
        </div>

        <div class="info-grupo">
            <div class="label">Data de Registro</div>
            <div class="dado"><?php echo $servicoEncontrado['data'] . " - " . $servicoEncontrado['hora']; ?></div>
        </div>

        <div class="botoes">
            <a href="index.php" class="btn-voltar">Voltar para a Lista</a>
            <a href="editar.php?id=<?php echo $servicoEncontrado['id']; ?>" class="btn-editar">Ir para Edição</a>
        </div>
    </div>

</body>

</html>