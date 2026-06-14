<?php
    require __DIR__ . "/registro_servico.php";
    require __DIR__ . "/log_registro.php";

    $caminhoJSON = dirname(__DIR__) . "/controller/registros.json";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $titulo = $_POST['titulo'];
        $cliente = $_POST['cliente'];
        $descricao = $_POST['descricao'];
        $status = $_POST['status'];

        $conteudoRecebido = file_exists($caminhoJSON) ? file_get_contents($caminhoJSON) : "";
        $listaRegistros = json_decode($conteudoRecebido, true) ?? [];

        $tamanhoLista = count($listaRegistros);
        $tamanhoLista++;

        // Cria o objeto usando as variáveis limpas
        $registro = new registro($tamanhoLista, $titulo, $cliente, $descricao, new DateTime(), $status);
            
        $listaRegistros[] = $registro->paraArray();
        $jsonFinal = json_encode($listaRegistros, JSON_PRETTY_PRINT);

        file_put_contents($caminhoJSON, $jsonFinal);

        $mensagemLog = "Serviço criado com o título: '{$titulo}' para o cliente: '{$cliente}'.";
        registrarAcao("CRIAR", $tamanhoLista, $mensagemLog);

        header("Location: ../view/sucesso.php");
        exit;
    }
?>