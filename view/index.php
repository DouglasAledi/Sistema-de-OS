<?php

    require __DIR__ . "/../model/salvar_registro.php";

    $caminhoJSON = dirname(__DIR__) . "/controller/registros.json";
    

    // 1. Carrega os dados do arquivo JSON
    $conteudoJson = file_exists($caminhoJSON) ? file_get_contents($caminhoJSON) : "";
    $listaRegistro = json_decode($conteudoJson, true) ?? [];

    // 2. Descobre o serviço mais recente (primeiro item da lista)
    $ultimoServico = $listaRegistro[0] ?? null;

    // 3. Inicializa os contadores zerados
    $totalClientesAtivos = 0;
    $pendentes = 0;
    $emAndamento = 0;
    $finalizados = 0;
    $clientesContados = [];

    // 4. Passa pelos registros somando as estatísticas
    foreach ($listaRegistro as $item) {
        if ($item['status'] === 'Pendente') {
            $pendentes++;
        } elseif ($item['status'] === 'Em andamento') {
            $emAndamento++;
        } elseif ($item['status'] === 'Finalizado') {
            $finalizados++;
        }

        if (!empty($item['nomeCliente']) && !in_array($item['nomeCliente'], $clientesContados)){
            $clientesContados[] = $item['nomeCliente'];
        }
    }
    
    // 5. Define o total final de clientes únicos ativos
    $totalClientesAtivos = count($clientesContados);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel de Registros</title>
    <link rel="stylesheet" href="../style/index_php.css">
</head>
<body>

    <nav>
        <a href="index.php" class="logo-area">
            🛠️ C.D.R Serviços
        </a>
        
        <ul>
            <li><a href="index.php" class="ativo">Home</a></li>
            <li><a href="index.php">Registros</a></li>
            <li><a href="#">Orçamentos</a></li>
            <li><a href="#">Relatórios</a></li>
            <li><a href="visualizar_logs.php">Histórico de Logs</a></li>
        </ul>

        <div class="nav-usuario">
            <span>Luiz Claudio (Carioca)</span>
            <div style="width:32px; height:32px; background:#3b82f6; border-radius:50%; display:flex; align-items:center; justify-content:center; font-weight:bold; font-size:12px;">C</div>
        </div>
    </nav>

    <div class="painel-container">
        
        <aside class="coluna-esquerda">
            
            <div class="card-lateral">
                <h3>Serviços Recentes</h3>
                <?php if ($ultimoServico): ?>
                    <div class="titulo-recente"><?= htmlspecialchars($ultimoServico['titulo']) ?></div>
                    <div class="cliente-recente"><?= htmlspecialchars($ultimoServico['nomeCliente']) ?></div>
                <?php else: ?>
                    <div class="cliente-recente">Nenhum serviço registrado.</div>
                <?php endif; ?>
            </div>

            <div class="card-lateral">
                <h3>Clientes Ativos</h3>
                <div class="numero-grande"><?= $totalClientesAtivos ?></div>
            </div>

            <div class="card-lateral">
                <h3>Orçamentos Pendentes</h3>
                <div class="numero-grande"><?= $pendentes ?></div>
                <div class="sub-info">
                    <span>🔄 Em andamento: <strong><?= $emAndamento ?></strong></span>
                    <span>✅ Finalizados: <strong><?= $finalizados ?></strong></span>
                </div>
            </div>

        </aside>

        <main class="coluna-direita">
            <h1>Dashboard</h1>
            <h2>Lista de Serviços</h2>
            
            <div style="margin-bottom: 20px; text-align: right;">
                <a href="cadastrar_html.php" class="btn-novo">
                    + NOVO REGISTRO DE SERVIÇO
                </a>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Cliente</th>
                        <th>Data de Registro</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                
                    <?php foreach ($listaRegistro as $item): ?>

                        <?php
                            switch ($item["status"]) {
                                case "Pendente":
                                    $classeColorida = "laranja";
                                    break;
                                case "Em andamento":
                                    $classeColorida = "amarelo";
                                    break;
                                case "Finalizado":
                                    $classeColorida = "verde";
                                    break;
                                default:
                                    $classeColorida = "vermelho";
                                    break;
                            }
                        ?>

                        <tr>
                            <td><?php echo $item["id"]; ?></td>
                            <td style="font-weight: 500; color: #111827;"><?php echo htmlspecialchars($item["titulo"]); ?></td>
                            <td><?php echo htmlspecialchars($item["nomeCliente"]); ?></td>
                            <td><?php echo $item["dataRegistro"]; ?></td>
                            <td>
                                <span class="<?php echo $classeColorida; ?>">
                                    <?php echo $item["status"]; ?>
                                </span>
                            </td>
                            <td>
                                <a href="./visualizar.php?id=<?php echo $item["id"]; ?>" class="acao-link" style="color: #2563eb;">View</a>
                                <a href="./editar.php?id=<?php echo $item["id"]; ?>" class="acao-link" style="color: #4b5563;">Edit</a>
                                <a href="./confirmar_exclusao.php?id=<?= $item['id'] ?>" class="acao-link" style="color: #dc2626;">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                
                </tbody>
            </table>
        </main>

    </div>

</body>
</html>