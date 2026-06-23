<?php
    $caminhologs = dirname(__DIR__) . "/controller/logs.json";
    
    $listaLog = [];

    if(file_exists($caminhologs)){
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
    <title>Logs</title>

</head>
<body>

    <h2>Histórico de Logs</h2>
    <p>Rastreamento detalhado de Atividades</p>

    <table>
        <thead>
            <tr>
                <th>
                    Data
                </th>
                <th>
                    Hora
                </th>
                <th>
                    Operação
                </th>
                <th>
                    Usuário
                </th>
                <th>
                    Descrição detalhada
                </th>
                <th>
                    Item ID
                </th>
            </tr>
        </thead>
        <tbody>
            <?php if(empty($listaLog)): ?>
                <tr>
                    <td>
                    <tr colspan="6">Nenhun Log registrado ainda.</td>
                    </tr>
                    <?php else: ?>
                        <?php foreach($listaLog as $log): ?>
                            <tr>
                                <td>
                                    <?php
                                        htmlspecialchars($data[0] ?? '');
                                     ?>
                                </td>
                                <td>
                                    <?= htmlspecialchars($log['hora'] ?? '')?>
                                </td>
                                <td>
                                    <?= htmlspecialchars($log['acao']) ?? '' ?>
                                </td>
                                <td>
                                    <?= htmlspecialchars($log['usuario']) ?? ' ' ?>
                                </td>
                                <td>
                                    <?= htmlspecialchars($log['detalhes']) ?? '' ?>
                                </td>
                                <td>
                                    <?= htmlspecialchars($log['servico_id']) ?>
                                </td>
                            </tr>
                        <?php endforeach ?>
                </tr>
            <?php endif ?>
        </tbody>
    </table>
    
</body>
</html>