<?php
 include_once('config.php');
 // Preparar dados para inserção
// Check if form is submitted

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form   
    
    $nome_reservatorio = $_POST["nome_reservatorio"];
    $nome_proprietario = $_POST["nome_proprietario"];
    $leitura1_1 = $_POST["leitura1_1"];
    $leitura1_2 = $_POST["leitura1_2"];
    $leitura1_3 = $_POST["leitura1_3"];
    $leitura2_1 = $_POST["leitura2_1"];
    $leitura2_2 = $_POST["leitura2_2"];
    $leitura2_3 = $_POST["leitura2_3"];
    $leitura3_1 = $_POST["leitura3_1"];
    $leitura3_2 = $_POST["leitura3_2"];
    $leitura3_3 = $_POST["leitura3_3"];
    $leitura4_1 = $_POST["leitura4_1"];
    $leitura4_2 = $_POST["leitura4_2"];
    $leitura4_3 = $_POST["leitura4_3"];
    $leitura5_1 = $_POST["leitura5_1"];
    $leitura5_2 = $_POST["leitura5_2"];
    $leitura5_3 = $_POST["leitura5_3"];
    $leitura6_1 = $_POST["leitura6_1"];
    $leitura6_2 = $_POST["leitura6_2"];
    $leitura6_3 = $_POST["leitura6_3"]; 
    $leitura7_1 = $_POST["leitura7_1"];
    $leitura7_2 = $_POST["leitura7_2"];
    $leitura7_3 = $_POST["leitura7_3"];
    $leitura8_1 = $_POST["leitura8_1"];
    $leitura8_2 = $_POST["leitura8_2"];
    $leitura8_3 = $_POST["leitura8_3"];

    
    // Criar e executar a instrução SQL com prepared statement
    $sql = "INSERT INTO calibracao (nome_reservatorio, nome_proprietario, 
        leitura1_1, leitura1_2, leitura1_3, leitura2_1, leitura2_2, leitura2_3, 
        leitura3_1, leitura3_2, leitura3_3, leitura4_1, leitura4_2, leitura4_3, 
        leitura5_1, leitura5_2, leitura5_3, leitura6_1, leitura6_2, leitura6_3, 
        leitura7_1, leitura7_2, leitura7_3, leitura8_1, leitura8_2, leitura8_3) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql); // Corrigi a indentação aqui
    if ($stmt === false) {  // Adicionei a verificação da preparação da instrução
        die("Erro ao preparar a instrução SQL: " . $conn->error);
    }

    $stmt->bind_param("ssdddddddddddddddddddddddd", $nome_reservatorio, $nome_proprietario,
        $leitura1_1, $leitura1_2, $leitura1_3, $leitura2_1, $leitura2_2, $leitura2_3,
         $leitura3_1, $leitura3_2, $leitura3_3, $leitura4_1, $leitura4_2, $leitura4_3, 
        $leitura5_1, $leitura5_2, $leitura5_3, $leitura6_1, 
        $leitura6_2, $leitura6_3, $leitura7_1, $leitura7_2, 
        $leitura7_3, $leitura8_1, $leitura8_2, $leitura8_3);

    if ($stmt->execute() === false) {  // Adicionei a verificação da execução da instrução
        die("Erro ao executar a instrução SQL: " . $stmt->error);
    }

    // Verificar se a inserção foi bem-sucedida
    if ($stmt->affected_rows == 1) {
        echo "Dados inseridos com sucesso!";
    } else {
        echo "Erro ao inserir dados: " . $conn->error;
    }

    // Fechar a conexão com o banco de dados
    $stmt->close();
    $conn->close();

}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoramento de Reservatório</title>
    <link rel="stylesheet" href="calib.css">
</head>
<body>
    <br>
    <br>
    <br>
    <h1>CALIBRAGEM DO EQUIPAMENTO</h1>
        <form action="calib.php" method="post">
        <br>
        <br>
        <label for="nome_reservatorio">Nome do Reservatório:</label>
        <input type="text" id="nome_reservatorio" name="nome_reservatorio" required>
        <br>
        <label for="nome_proprietario">Nome do Proprietário:</label>
        <input type="text" id="nome_proprietario" name="nome_proprietario" required>

        <h2>Parâmetros de Leitura</h2>

        <table id="parametros">
            <thead>
                <tr>
                    <th>Parâmetro (mg/L)</th>
                    <th>Leitura 1 (abs)</th>
                    <th>Leitura 2 (abs)</th>
                    <th>Leitura 3 (abs)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>0.1</td>
                    <td><input type="double" name="leitura1_1" required></td>
                    <td><input type="double" name="leitura1_2" required></td>
                    <td><input type="double" name="leitura1_3" required></td>
                </tr>
                <tr>
                    <td>0.25</td>
                    <td><input type="double" name="leitura2_1" required></td>
                    <td><input type="double" name="leitura2_2" required></td>
                    <td><input type="double" name="leitura2_3" required></td>
                </tr>
                <tr>
                    <td>0.5</td>
                    <td><input type="double" name="leitura3_1" required></td>
                    <td><input type="double" name="leitura3_2" required></td>
                    <td><input type="double" name="leitura3_3" required></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td><input type="double" name="leitura4_1" required></td>
                    <td><input type="double" name="leitura4_2" required></td>
                    <td><input type="double" name="leitura4_3" required></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td><input type="double" name="leitura5_1" required></td>
                    <td><input type="double" name="leitura5_2" required></td>
                    <td><input type="double" name="leitura5_3" required></td>
                </tr>
                <tr>
                    <td>3.5</td>
                    <td><input type="double" name="leitura6_1" required></td>
                    <td><input type="double" name="leitura6_2" required></td>
                    <td><input type="double" name="leitura6_3" required></td>
                </tr>
                <tr>
                    <td>6.5</td>
                    <td><input type="double" name="leitura7_1" required></td>
                    <td><input type="double" name="leitura7_2" required></td>
                    <td><input type="double" name="leitura7_3" required></td>
                </tr>
                <tr>
                    <td>10</td>
                    <td><input type="double" name="leitura8_1" required></td>
                    <td><input type="double" name="leitura8_2" required></td>
                    <td><input type="double" name="leitura8_3" required></td>
                </tr>
            </tbody>
        </table>

        <button type="submit">Enviar</button>
    </form>
</body>
</html>
