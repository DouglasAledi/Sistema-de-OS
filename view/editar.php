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
       if ($idUrl == $id["id"]){
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
    <title>Editar Serviço</title>
    <style>
        body { font-family: sans-serif; background-color: #f9f9f9; padding: 20px; }
        .form-box { background: white; max-width: 500px; margin: 0 auto; padding: 30px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        h2 { margin-top: 0; color: #333; }
        .campo { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; color: #555; }
        input[type="text"], select { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        .btn-salvar { background-color: #007bff; color: white; border: none; padding: 10px 15px; border-radius: 4px; font-weight: bold; cursor: pointer; }
        .btn-salvar:hover { background-color: #0056b3; }
        .btn-cancelar { color: #666; text-decoration: none; margin-left: 15px; font-size: 14px; }
        input[type="text"], select, textarea { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
    </style>
</head>
<body>

    <div class="form-box">
        <h2>Editar Serviço #<?php echo $servicoEncontrado['id']; ?></h2>
        
        <form action="../model/atualizar_registro.php" method="POST">
            
            <input type="hidden" name="id" value="<?php echo $servicoEncontrado['id']; ?>">

            <div class="campo">
                <label>Título do Serviço</label>
                <input type="text" name="titulo" value="<?php echo $servicoEncontrado['titulo']; ?>" required>
            </div>

            <div class="campo">
                <label>Nome do Cliente</label>
                <input type="text" name="nomeCliente" value="<?php echo $servicoEncontrado['nomeCliente']; ?>" required>
            </div>

            <div class="campo">
                <label>Descrição</label>
                <textarea name="descricao" rows="5" required><?php echo $servicoEncontrado['descricao']; ?></textarea>
            </div>

            <div class="campo">
                <label>Status</label>
                <select name="status">
                    <option value="1" <?php echo ($servicoEncontrado['status'] == 'Pendente') ? 'selected' : ''; ?>>Pendente</option>
                    <option value="2" <?php echo ($servicoEncontrado['status'] == 'Em andamento') ? 'selected' : ''; ?>>Em andamento</option>
                    <option value="3" <?php echo ($servicoEncontrado['status'] == 'Finalizado') ? 'selected' : ''; ?>>Finalizado</option>
                </select>
            </div>

            <button type="submit" class="btn-salvar">Salvar Alterações</button>
            <a href="index.php" class="btn-cancelar">Cancelar</a>
        </form>
    </div>

</body>
</html>