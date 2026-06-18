<?php
    require __DIR__ . "/registro_servico.php";
    require __DIR__ . "/log_registro.php";

    $caminhoJSON = dirname(__DIR__) . "/controller/registros.json";

    $conteudoJson = file_exists($caminhoJSON) ? file_get_contents($caminhoJSON) : "";

    $listaRegistro = json_decode($conteudoJson, true) ?? [];

    $id = (int) $_POST["id"];
    $titulo = $_POST["titulo"];
    $nomeCliente = $_POST["nomeCliente"];
    $descricao = $_POST["descricao"];
    $status = (int) $_POST["status"];

    foreach ($listaRegistro as $chave => $item) {
        if ($item["id"] == $id){
            $listaRegistro[$chave]["titulo"] = $titulo;
            $listaRegistro[$chave]["nomeCliente"] = $nomeCliente;
            $listaRegistro[$chave]["descricao"] = $descricao;
            $listaRegistro[$chave]["status"] = match ($status) {
                1 => "Pendente",
                2 => "Em andamento",
                3 => "Finalizado",
            };
            $mensagemLog = "O serviço foi editado. Novo título: '{$titulo}' | Cliente: {$nomeCliente}'.";
            registrarAcao("EDITAR", $id, $mensagemLog);
        break;
        }
    }
    $jsonSalvo = json_encode($listaRegistro, JSON_PRETTY_PRINT);
    file_put_contents("../controller/registros.json", $jsonSalvo);
    header("Location: ../view/index.php");
    exit;
?>