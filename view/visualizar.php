<?php 

    if (!isset($_GET["id"])) {
        header("Location: index.php");
        exit;
    }

    $idUrl = (int)$_GET["id"];

    $caminhoJSON = dirname(__DIR__) . ("/controller/registros.json");

    $conteudoJson = file_exists($caminhoJSON) ? file_get_contents($caminhoJSON) : "";

    $listaRegistro = json_decode($conteudoJson, true) ?? [];

    $servicoEncontrado = null;

    foreach ($listaRegistro as $id){
        if ($id["id"] == $idUrl){
            $servicoEncontrado = $id;
        break;
        }
    }
    if (!$servicoEncontrado) {
        header("Location: index.php");
        exit;
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Visualizar Serviço</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            background-color: #f4f6f9; 
            padding: 40px 20px; 
            margin: 0;
        }
        .view-box { 
            background: white; 
            max-width: 550px; 
            margin: 0 auto; 
            padding: 35px; 
            border-radius: 12px; 
            box-shadow: 0 4px 12px rgba(0,0,0,0.05); 
        }
        h2 { 
            margin-top: 0; 
            color: #2d3748; 
            border-bottom: 2px solid #edf2f7; 
            padding-bottom: 15px;
            font-size: 24px;
        }
        .info-grupo { 
            margin-bottom: 22px; 
        }
        .label { 
            font-weight: bold; 
            color: #718096; 
            font-size: 13px; 
            text-transform: uppercase; 
            letter-spacing: 0.5px;
        }
        .dado { 
            font-size: 18px; 
            color: #1a202c; 
            margin-top: 6px; 
            padding: 8px 12px;
            background-color: #f7fafc;
            border-radius: 6px;
            border: 1px solid #e2e8f0;
        }
        .botoes {
            margin-top: 30px;
            display: flex;
            gap: 15px;
        }
        .btn-voltar { 
            display: inline-block; 
            background-color: #718096; 
            color: white; 
            text-decoration: none; 
            padding: 12px 20px; 
            border-radius: 6px; 
            font-weight: bold; 
            transition: background 0.2s;
        }
        .btn-voltar:hover { 
            background-color: #4a5568; 
        }
        .btn-editar { 
            display: inline-block; 
            background-color: #007bff; 
            color: white; 
            text-decoration: none; 
            padding: 12px 20px; 
            border-radius: 6px; 
            font-weight: bold; 
            transition: background 0.2s;
        }
        .btn-editar:hover { 
            background-color: #0056b3; 
        }
    </style>
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
            <div class="dado"><?php echo $servicoEncontrado['dataRegistro']; ?></div>
        </div>

        <div class="botoes">
            <a href="index.php" class="btn-voltar">Voltar para a Lista</a>
            <a href="editar.php?id=<?php echo $servicoEncontrado['id']; ?>" class="btn-editar">Ir para Edição</a>
        </div>
    </div>

</body>
</html>