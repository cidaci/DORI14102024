<?php
include_once('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Função para upload de imagem (com tratamento de erros)
    function uploadImagem($imagem) {
        $target_dir = "imagem/";
        $target_file = $target_dir . basename($imagem["name"]);

        if (move_uploaded_file($imagem["tmp_name"], $target_file)) {
            return $target_file;
        } else {
            echo "Erro ao fazer upload da imagem.";
            return null;
        }
    }

    // Recebendo os dados do formulário
    $nome = $_POST['nome'];
    $localizacao = $_POST['localizacao'];
    $data_coleta = $_POST['data_coleta'];
    $especie_peixe = $_POST['especie_peixe'];
    $quantidade_peixes = $_POST['quantidade_peixes'];
    $tamanho_medio_peixes = $_POST['tamanho_medio_peixes'];
    $imagem = $_FILES["imagem"];

    // Upload da imagem
    $imagem_path = null;
    if (isset($imagem) && $imagem["error"] === 0) {
        $imagem_path = uploadImagem($imagem);
        if (!$imagem_path) {
            $erros[] = "Erro ao enviar a imagem.";
        }
    }

    // Verifica se o upload da imagem foi bem-sucedido
    if ($imagem_path) {
        // Preparando a query SQL com parâmetros para evitar injeção de SQL
        $stmt = $conn->prepare("INSERT INTO reservatorios (nome, localizacao, data_coleta, especie_peixe, quantidade_peixes, tamanho_medio_peixes, imagem) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssis", $nome, $localizacao, $data_coleta, $especie_peixe, $quantidade_peixes, $tamanho_medio_peixes, $imagem_path);

        // Executando a query
        if ($stmt->execute()) {
            echo "Novos registros inseridos com sucesso";
        } else {
            echo "Erro ao inserir registros: " . $stmt->error;
        }

        $stmt->close();
    }

    $conn->close();
}
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coleta de Dados do Açude de Peixes</title>
    <link rel="stylesheet" href="style_acude.css">
</head>
<body>
    <h1>COLETA DE DADOS DO RESERVATÓRIO</h1>
    <form action="acude.php" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend>Identificação do Reservatório</legend>
        <label for="nome">Nome do Reservatório:
            <input type="text" id="nome" name="nome" required placeholder="Digite o nome do reservatório">
        </label>
        <label for="localizacao">Localização:
            <input type="text" id="localizacao" name="localizacao" required placeholder="Digite a localização">
        </label>
        <label for="data_coleta">Data da Coleta:
            <input type="date" id="data_coleta" name="data_coleta" required>
        </label>
    </fieldset>

    <fieldset>
        <legend>População de Peixes</legend>
        <label for="especie_peixe">Espécie de Peixe:
            <input type="text" id="especie_peixe" name="especie_peixe" required>
        </label>
        <label for="quantidade_peixes">Quantidade de Peixes:
            <input type="number" id="quantidade_peixes" name="quantidade_peixes" required min="0">
        </label>
        <label for="tamanho_medio_peixes">Tamanho Médio dos Peixes (cm):
            <input type="number" id="tamanho_medio_peixes" name="tamanho_medio_peixes" required min="0">
        </label>
        <label for="imagem">Imagem do Reservatório:
            <input type="file" id="imagem" name="imagem" accept="imagem/*">
        </label>
    </fieldset>

    <button type="submit">Enviar</button>
</form>
</body>
</html>