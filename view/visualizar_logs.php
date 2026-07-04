<?php
$caminhologs = dirname(__DIR__) . "/controller/logs.json";

$listaLog = [];

if (file_exists($caminhologs)) {
    $conteudoLogs = file_get_contents($caminhologs);
    $conteudoDecodificado = json_decode($conteudoLogs, true) ?? [];

    $listaLog = array_reverse($conteudoDecodificado);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histórico de Logs</title>
    <link rel="stylesheet" href="../style/logs_php.css">
    <link rel="stylesheet" href="../style/index_php.css">
</head>

<body>
    <nav>
        <a href="index.php" class="logo-area">
            🛠️ C.D.R Serviços
        </a>

        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="index.php">Registros</a></li>
            <li><a href="#">Orçamentos</a></li>
            <li><a href="#">Relatórios</a></li>
            <li><a href="visualizar_logs.php" class="ativo">Histórico de Logs</a></li>
        </ul>

        <div class="nav-usuario">
            <span>Luiz Claudio (Carioca)</span>
            <div style="width:32px; height:32px; background:#3b82f6; border-radius:50%; display:flex; align-items:center; justify-content:center; font-weight:bold; font-size:12px; color: white;">C</div>
        </div>
    </nav>

    <div class="header-container">
        <div class="header-titles">
            <h2>Histórico de Logs</h2>
            <p>Rastreamento detalhado de atividades do sistema</p>
        </div>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Hora</th>
                    <th>Operação</th>
                    <th>Usuário</th>
                    <th>Descrição detalhada</th>
                    <th>Item ID</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($listaLog)): ?>
                    <tr>
                        <td colspan="6" class="sem-registro">Nenhum Log registrado ainda.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($listaLog as $log):
                        $acao = strtoupper($log['acao'] ?? '');
                        $classeBadge = 'badge-padrao';
                        if ($acao === 'CRIAR') $classeBadge = 'badge-criar';
                        if ($acao === 'EXCLUIR') $classeBadge = 'badge-excluir';
                    ?>
                        <tr>
                            <td><?= htmlspecialchars($log['data'] ?? ''); ?></td>
                            <td><?= htmlspecialchars($log['hora'] ?? ''); ?></td>
                            <td>
                                <span class="badge <?= $classeBadge; ?>">
                                    <?= htmlspecialchars($acao); ?>
                                </span>
                            </td>
                            <td><span style="color: #94a3b8;">Sistema</span></td>
                            <td><?= htmlspecialchars($log['detalhes'] ?? ''); ?></td>
                            <td class="id-text">#<?= htmlspecialchars($log['servico_id'] ?? ''); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</body>

</html>