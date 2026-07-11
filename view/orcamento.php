<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../style/orcamento.css">
</head>

<body>

    <nav>
        <a href="index.php" class="logo-area">
            🛠️ C.D.R Serviços
        </a>

        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="orcamento.php" class="ativo">Orçamentos</a></li>
            <li><a href="#">Relatórios</a></li>
            <li><a href="visualizar_logs.php">Histórico de Logs</a></li>
        </ul>

        <div class="nav-usuario">
            <span>Luiz Claudio (Carioca)</span>
            <div style="width:32px; height:32px; background:#3b82f6; border-radius:50%; display:flex; align-items:center; justify-content:center; font-weight:bold; font-size:12px; color: white;">C</div>
        </div>
    </nav>

    <div class="orcamentos-container">
        <h2>Selecione a Categoria do Orçamento</h2>
        <p>Escolha a área desejada para gerar ou consultar um orçamento</p>

        <div class="categorias-grid">
            <a href="orcamento_eletrica.php" class="card-categoria eletrica">
                <div class="card-icone">⚡</div>
                <div class="card-info">
                    <h3>Elétrica</h3>
                </div>
            </a>
        </div>
        <form action="">
            <label for="">Nome do Cliente:</label>
            <input type="text">

            <label for="">Endereço:</label>
            <input type="text" name="" id="">

            <label for="">Serviço ou Orçamento:</label>
            <div>
                <input type="radio" name="opcao" id="">
                <label for="">Serviço</label>
            </div>
            <div>
                <input type="radio" name="opcao" id="">
                <label for="">Orçamento</label>
            </div>

            <label for="">Data:</label>
            <input type="date">

            <div>
                <label for="">Lista de materiais:</label>

                <label for="">Mão de obra:</label>
                <input type="text">
            </div>
        </form>
    </div>

</body>

</html>