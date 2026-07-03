<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Novo Serviço</title>
    <link rel="stylesheet" href="../style/cadastrar_html_php.css">
</head>
<body>

    <div class="mensagem-box">
        <h2>Novo Registro de Serviço</h2>
        
        <form action="../model/salvar_registro.php" method="POST">
            
            <div class="campo">
                <label for="titulo">Título do Serviço:</label>
                <input type="text" id="titulo" name="titulo" required placeholder="Ex: Instalação Elétrica">
            </div>

            <div class="campo">
                <label for="cliente">Nome do Cliente:</label>
                <input type="text" id="cliente" name="cliente" required placeholder="Ex: Douglas">
            </div>

            <div class="campo">
                <label for="descricao">Descrição do Serviço</label><br>
                <textarea id="descricao" name="descricao" rows="5" required placeholder="Digite os detalhes do serviço..."></textarea>
            </div>

            <div class="campo">
                <label for="status">Status Inicial:</label>
                <select id="status" name="status">
                    <option value="1">Pendente</option>
                    <option value="2">Em Andamento</option>
                    <option value="3">Finalizado</option>
                </select>
            </div>

            <button type="submit">Salvar Serviço</button>
        </form>

        <a href="index.php" class="voltar">← Voltar para a Tabela</a>
    </div>

</body>
</html>